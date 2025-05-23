<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Invoice;
use App\Models\InvoiceAP;
use App\Models\Order;
use App\Models\OrderAP;
use App\Models\Price;
use App\Models\StatusPembayaran;
use App\Models\StatusPembayaranAP;
use App\Models\Transactions;
use App\Models\Vehicle;
use App\Models\Vendors;
use Support\BaseController;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Date;
use Support\Response;
use Support\UUID;

class OrderController extends BaseController
{
    // Controller logic here
    public function index()
    {
        $vendor = Vendors::query()->where('deleted_at','=',null)->get();
        $vehicle = Vehicle::query()->where('deleted_at','=',null)->get();
        $driver = Drivers::query()->where('deleted_at','=',null)->get();
        return view('transactions/transaction',['vendor'=>$vendor,'vehicle'=>$vehicle,'driver'=>$driver],'layout/app');
    }

    public function getOrders(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
            $orders = Order::query()->selectRaw('orders.uuid')
                                            ->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')
                                            ->leftJoin('vehicles','vehicles.vehicle_id','=','orders.vehicle_id')
                                            ->leftJoin('drivers','drivers.driver_id','=','orders.driver_id')->where('orders.deleted_at','=',null)
                                            ->whereBetween('tgl_pembuatan_po',$request->startdate,$request->enddate)->get();
            return DataTables::of($orders)
                                ->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function getPrice(Request $request)
    {
        $data =$request->price;
        $project = $request->project;
        $price = Vehicle::query()->leftJoin('prices','prices.vehicle_id','=','vehicles.vehicle_id')->where('vehicles.vehicle_id','=',$data)->where('project','=',$project)->first();
        return Response::json(['status'=>200,'message'=>'success','data'=>$price->toArray()]);
    }

    public function getProject(Request $request)
    {
        $data =$request->vehicle;
        $price = Price::getPrice($data);
        return Response::json(['status'=>200,'message'=>'success','data'=>$price]);
    }
    
    public function getPricePO(Request $request)
    {
        $data =$request->order_id;
        $price = Order::getPOPrice($data);
        return Response::json(['status'=>200,'message'=>'success','data'=>$price->toArray()]);
    }

    public function generatePO(Request $request)
    {
        $generatePO = Order::query()->orderBy('no_po','DESC')->first();
        if($generatePO){
            $code = intval(substr($generatePO->no_po,3));
            $newcode = 'DO-'.str_pad($code+1,7,'0',STR_PAD_LEFT).'-'.Date::parse(Date::Now())->format('m').'-'.Date::parse(Date::Now())->format('Y');
        } else {
            $newcode = 'DO-'.'0000001'.'-'.Date::parse(Date::Now())->format('m').'-'.Date::parse(Date::Now())->format('Y');
        }
        return Response::json(['status'=>200,'code'=>$newcode]);
    }

    public function detailOrders($nopo)
    {
        $order = Order::query()
                                ->leftJoin('drivers','drivers.driver_id','=','orders.driver_id')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','orders.vehicle_id')
                                ->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')
                                ->where('no_po','=',$nopo)->first();
        return view('transactions/detailorders',['order'=>$order],'layout/app');
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'vendor_id' => 'required',
            'origin_city' => 'required',
            'destination' => 'required',
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'price' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $orders = Order::create([
            'uuid' => UUID::generateUuid(),
            'no_po' => $request->no_po,
            'vendor_id' => $request->vendor_id,
            'pickup_date' => $request->pickup_date,
            'tgl_pembuatan_po' => $request->tgl_pembuatan_po,
            'origin_city' => ucfirst($request->origin_city),
            'destination' => ucfirst($request->destination),
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'price' => $request->price,
            'invoice_id' => null,
            'no_surat_jalan' => null,
            'bukti' => null,
            'status' => $request->status,
        ]);
        return Response::json(['status'=>201,'message'=>'Order berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $orders = Order::getID($id);
        $orders->vendor_id = $request->vendor_id;
        $orders->pickup_date = $request->pickup_date;
        $orders->tgl_pembuatan_po = $request->tgl_pembuatan_po;
        $orders->origin_city = $request->origin_city;
        $orders->destination = $request->destination;
        $orders->vehicle_id = $request->vehicle_id;
        $orders->driver_id = $request->driver_id;
        $orders->price = $request->price;
        $orders->invoice_id = $request->invoice_id;
        $orders->status = $request->status;
        $orders->updated_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>201,'message'=>'Order berhasil diupdate']);
    }

    public function updateSuratJalan(Request $request,$po)
    {
        $orders = Order::query()->where('no_po','=',$po)->first();
        $validateType = $request->getClientMimeType('bukti');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('bukti') && !in_array($validateType,$allowedTypes)){
            $errors = ['stnk' => ['File must be a valid image']];
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        $orders->no_surat_jalan = $request->no_surat_jalan;
        if($request->getClientOriginalName('bukti')){
            $path = storage_path('document/data');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = $request->getClientOriginalName('bukti');
            $tempPath = $request->getPath('bukti');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                $orders->bukti = $fileName;
            }
        }
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Berhasil update surat jalan','data'=>[
            'no_surat_jalan' => $orders->no_surat_jalan,
            'bukti' => $orders->bukti
        ]]);
    }

    public function delete(Request $request, $id)
    {
        $orders = Order::getID($id);
        $orders->deleted_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Order berhasil dihapus']);
    }

    public function detailTransaction(Request $request, $noinv)
    {
        $inv = Invoice::query()->where('no_invoice','=',$noinv)->first();
        $payment = StatusPembayaran::query()->where('invoice_id','=', $inv->invoice_id)->where('deleted_at','=',null)->orderBy('status_pembayaran_id','DESC')->get();
        return view('transactions/detailtransaction',['inv'=>$inv,'payment'=>$payment],'layout/app');
    }

    public function getDetailTransaksi(Request $request,$noinv)
    {
        if(Request::isAjax()){
            $detailTransaksi = StatusPembayaran::query()
                                ->leftJoin('invoices','invoices.invoice_id','=','status_pembayaran.invoice_id')
                                ->select('status_pembayaran.uuid','invoices.no_invoice','tanggal_pembayaran','status_pembayaran.jumlah','status_pembayaran.total_bayar','bukti_data','status_pembayaran.status','status_pembayaran.sisa_bayar')
                                ->where('invoices.no_invoice','=',$noinv)
                                ->where('status_pembayaran.deleted_at','=',null)
                                ->get();
            return DataTables::of($detailTransaksi)->make(true);
        }
    }

    public function addPembayaran(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'tanggal_pembayaran' => 'required',
            'jumlah' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $invoiceID = Invoice::query()->where('no_invoice','=',$request->no_invoice)->first();
        $pembayaranSebelumnya  = StatusPembayaran::query()->where('invoice_id','=',$invoiceID->invoice_id)->where('deleted_at','=',null)->get();
        $bayarSebelumnya = 0;
        foreach ($pembayaranSebelumnya as $item) {
            $bayarSebelumnya += $item->jumlah;
        }
        if($request->jumlah > $request->sisa_bayar){
            return Response::json(['status'=>400,'message'=>'Pembayaran melebihi total tagihan']);
        }
        if($request->getClientOriginalName('bukti_bayar')){
            $path = storage_path('document/data/ar/pembayaran');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('bukti_bayar'));
            $tempPath = $request->getPath('bukti_bayar');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                $pembayaran = StatusPembayaran::create([
                    'uuid' => UUID::generateUuid(),
                    'invoice_id' => $invoiceID->invoice_id,
                    'bukti_data' => $fileName,
                    'tanggal_pembayaran' => $request->tanggal_pembayaran,
                    'jumlah' => $request->jumlah,
                    'sisa_bayar' => $request->total_bayar-($bayarSebelumnya+$request->jumlah),
                    'total_bayar' => $request->total_bayar,
                    'status' => $request->status
                ]);
            }
        }
        $cektransaksi = Transactions::query()->where('reference_table','=','status_pembayaran')->where('reference_id','=',$invoiceID->invoice_id)->first();
        if(!$cektransaksi){
            $transaction = Transactions::create([
                'uuid' => UUID::generateUuid(),
                'payment_id' => 1,
                'reference_table' => 'status_pembayaran',
                'reference_id' => $invoiceID->invoice_id,
                'reff' => $request->no_invoice,
                'jenis_transaction' => 'Payment',
                'type_transaction' => 'income',
                'transaction_date' => $request->tanggal_pembayaran,
                'amount' => $request->jumlah,
                'description' => ucfirst($request->description),
                'status' => $request->status,
                'created_at' => Date::Now(),
                'updated_at' => Date::Now(),
            ]);
        }
        return Response::json(['status'=>201,'message'=>'Pembayaran sukses']);
    }

    public function deletePembayaran(Request $request, $id)
    {
        $pembayaran = StatusPembayaran::query()->where('uuid','=',$id)->first();
        $pembayaran->deleted_at = Date::Now();
        $pembayaran->save();
        return Response::json(['status'=>200,'message'=>'Pembayaran deleted']);
    }

    public function indexAP()
    {
        return view('transactions/transaction-ap',[],'layout/app');
    }

    public function getOrdersAP(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
            $orders = OrderAP::query()->where('deleted_at','=',null)
                        ->whereBetween('tgl_pembuatan_po',$request->startdate,$request->enddate)->get();
            return DataTables::of($orders)
                                ->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function createAP(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'no_po' => 'required',
            'vendor' => 'required',
            'origin_city' => 'required',
            'destination' => 'required',
            'vehicle' => 'required',
            'project' => 'required',
            'driver' => 'required',
            'price' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $orders = OrderAP::create([
            'uuid' => UUID::generateUuid(),
            'no_po' => $request->no_po,
            'vendor' => $request->vendor,
            'pickup_date' => $request->pickup_date,
            'tgl_pembuatan_po' => $request->tgl_pembuatan_po,
            'origin_city' => ucfirst($request->origin_city),
            'destination' => ucfirst($request->destination),
            'vehicle' => ucfirst($request->vehicle),
            'driver' => ucfirst($request->driver),
            'project' => ucfirst($request->project),
            'price' => $request->price,
            'pajak' => $request->pajak,
            'total' => $request->pajak + $request->price,
            'invoice_ap_id' => null,
            'quotation' => null,
            'status' => $request->status,
        ]);
        return Response::json(['status'=>201,'message'=>'Order berhasil dibuat']);
    }

    public function updateAP(Request $request, $id)
    {
        $orders = OrderAP::getID($id);
        $orders->vendor = $request->vendor;
        $orders->pickup_date = $request->pickup_date;
        $orders->tgl_pembuatan_po = $request->tgl_pembuatan_po;
        $orders->origin_city = $request->origin_city;
        $orders->destination = $request->destination;
        $orders->vehicle = $request->vehicle;
        $orders->driver = $request->driver;
        $orders->project = $request->project;
        $orders->price = $request->price;
        $orders->pajak = $request->pajak;
        $orders->total = $request->price + $request->pajak;
        $orders->status = $request->status;
        $orders->updated_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>201,'message'=>'Order berhasil diupdate']);
    }

    public function deleteAP(Request $request, $id)
    {
        $orders = OrderAP::getID($id);
        $orders->deleted_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Order berhasil dihapus']);
    }

    public function detailOrdersAP($nopo)
    {
        $order = OrderAP::query()->where('no_po','=',$nopo)->first();
        return view('transactions/detailorders-ap',['order'=>$order],'layout/app');
    }

    public function updateQuotation(Request $request,$po)
    {
        $orders = OrderAP::query()->where('no_po','=',$po)->first();
        $validateType = $request->getClientMimeType('quotation');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('quotation') && !in_array($validateType,$allowedTypes)){
            $errors = ['stnk' => ['File must be a valid image']];
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('quotation')){
            $path = storage_path('document/data/quotation/');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = $request->getClientOriginalName('quotation');
            $tempPath = $request->getPath('quotation');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                $orders->quotation = $fileName;
            }
        }
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Berhasil update quotation','data'=>[
            'quotation' => $orders->quotation
        ]]);
    }

    public function getPricePOAP(Request $request)
    {
        $data = $request->order_ap_id;
        $price = OrderAP::query()->where('order_ap_id','=',$data)->first();
        return Response::json(['status'=>200,'message'=>'success','data'=>$price->toArray()]);
    }

    public function detailTransactionAP(Request $request, $noinv)
    {
        $inv = InvoiceAP::query()->where('no_invoice','=',$noinv)->first();
        $payment = StatusPembayaranAP::query()->where('invoice_ap_id','=', $inv->invoice_ap_id)->where('deleted_at','=',null)->orderBy('status_pembayaran_ap_id','DESC')->get();
        return view('transactions/detailtransaction-ap',['inv'=>$inv,'payment'=>$payment],'layout/app');
    }

    public function getDetailTransaksiAP(Request $request,$noinv)
    {
        if(Request::isAjax()){
            $detailTransaksi = StatusPembayaranAP::query()
                                ->leftJoin('invoices_ap','invoices_ap.invoice_ap_id','=','status_pembayaran_ap.invoice_ap_id')
                                ->select('status_pembayaran_ap.uuid','invoices_ap.no_invoice','tanggal_pembayaran','status_pembayaran_ap.jumlah','status_pembayaran_ap.total_bayar','bukti_data','status_pembayaran_ap.status','status_pembayaran_ap.sisa_bayar')
                                ->where('invoices_ap.no_invoice','=',$noinv)
                                ->where('status_pembayaran_ap.deleted_at','=',null)
                                ->get();
            return DataTables::of($detailTransaksi)->make(true);
        }
    }

    public function addPembayaranAP(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'tanggal_pembayaran' => 'required',
            'jumlah' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $invoiceID = InvoiceAP::query()->where('no_invoice','=',$request->no_invoice)->first();
        $pembayaranSebelumnya  = StatusPembayaranAP::query()->where('invoice_ap_id','=',$invoiceID->invoice_ap_id)->where('deleted_at','=',null)->get();
        $bayarSebelumnya = 0;
        foreach ($pembayaranSebelumnya as $item) {
            $bayarSebelumnya += $item->jumlah;
        }
        if($request->jumlah > $request->sisa_bayar){
            return Response::json(['status'=>400,'message'=>'Pembayaran melebihi total tagihan']);
        }
        if($request->getClientOriginalName('bukti_bayar')){
            $path = storage_path('document/data/ap/pembayaran');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('bukti_bayar'));
            $tempPath = $request->getPath('bukti_bayar');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                $pembayaran = StatusPembayaranAP::create([
                    'uuid' => UUID::generateUuid(),
                    'invoice_ap_id' => $invoiceID->invoice_ap_id,
                    'bukti_data' => $fileName,
                    'tanggal_pembayaran' => $request->tanggal_pembayaran,
                    'jumlah' => $request->jumlah,
                    'sisa_bayar' => $request->total_bayar-($bayarSebelumnya+$request->jumlah),
                    'total_bayar' => $request->total_bayar,
                    'status' => $request->status
                ]);
            }
        }
        $cektransaksi = Transactions::query()->where('reference_table','=','status_pembayaran_ap')->where('reference_id','=',$invoiceID->invoice_ap_id)->first();
        if(!$cektransaksi){
            $transaction = Transactions::create([
                'uuid' => UUID::generateUuid(),
                'payment_id' => 1,
                'reference_table' => 'status_pembayaran_ap',
                'reference_id' => $invoiceID->invoice_ap_id,
                'reff' => $request->no_invoice,
                'jenis_transaction' => 'Payment',
                'type_transaction' => 'outcome',
                'transaction_date' => $request->tanggal_pembayaran,
                'amount' => $request->jumlah,
                'description' => ucfirst($request->description),
                'status' => $request->status,
                'created_at' => Date::Now(),
                'updated_at' => Date::Now(),
            ]);
        }
        return Response::json(['status'=>201,'message'=>'Pembayaran sukses']);
    }

    public function deletePembayaranAP(Request $request, $id)
    {
        $pembayaran = StatusPembayaranAP::query()->where('uuid','=',$id)->first();
        $pembayaran->deleted_at = Date::Now();
        $pembayaran->save();
        return Response::json(['status'=>200,'message'=>'Pembayaran deleted']);
    }
}
