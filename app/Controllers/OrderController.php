<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Price;
use App\Models\StatusPembayaran;
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
            $orders = Order::query()->selectRaw('orders.uuid')
                                            ->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')
                                            ->leftJoin('vehicles','vehicles.vehicle_id','=','orders.vehicle_id')
                                            ->leftJoin('drivers','drivers.driver_id','=','orders.driver_id')->where('orders.deleted_at','=',null)->get();
            return DataTables::of($orders)
                                ->make(true);
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
        $price = Price::query()->where('vehicle_id','=',$data)->get();
        return Response::json(['status'=>200,'message'=>'success','data'=>$price]);
    }
    
    public function getPricePO(Request $request)
    {
        $data =$request->order_id;
        $price = Order::query()->where('order_id','=',$data)->first();
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
            'origin_city' => $request->origin_city,
            'destination' => $request->destination,
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
        $orders = Order::query()->where('uuid','=',$id)->first();
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
        $orders = Order::query()->where('uuid','=',$id)->first();
        $orders->deleted_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Order berhasil dihapus']);
    }

    public function detailTransaction(Request $request, $noinv)
    {
        $inv = Invoice::query()->where('no_invoice','=',$noinv)->first();
        return view('transactions/detailtransaction',['inv'=>$inv],'layout/app');
    }

    public function getDetailTransaksi(Request $request,$noinv)
    {
        if(Request::isAjax()){
            $detailTransaksi = StatusPembayaran::query()
                                ->leftJoin('invoices','invoices.invoice_id','=','status_pembayaran.invoice_id')
                                ->select('status_pembayaran.uuid','invoices.no_invoice','tanggal_pembayaran','status_pembayaran.jumlah','status_pembayaran.total_bayar','bukti_data','status_pembayaran.status')
                                ->where('invoices.no_invoice','=',$noinv)
                                ->get();
            return DataTables::of($detailTransaksi)->make(true);
        }
    }
}
