<?php

namespace App\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAP;
use App\Models\Order;
use App\Models\OrderAP;
use App\Models\Payment;
use App\Models\Transactions;
use App\Models\Vendors;
use Dompdf\Dompdf;
use Dompdf\Options;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\UUID;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class InvoiceController extends BaseController
{
    // Controller logic here
    public function index()
    {
        $payment = Payment::all();
        $vendor = Order::query()
                                ->where('invoice_id','=',null)
                                ->where('deleted_at','=',null)
                                ->where('no_surat_jalan','!=',null)
                                ->where('bukti','!=',null)->get();
        return view('invoices/invoice',['payment'=>$payment,'vendor'=>$vendor],'layout/app');
    }

    public function getInvoices(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
                $invoice = Invoice::query()->selectRaw('invoices.uuid')
                                            ->leftJoin('payments','payments.payment_id','=','invoices.payment_id')
                                            ->leftJoin('vendors','vendors.vendor_id','=','invoices.vendor_id')
                                            ->where('invoices.deleted_at','=',null)
                                            ->whereBetween('tgl_invoice',$request->startdate,$request->enddate)
                                            ->get();
                return DataTables::of($invoice)
                                    ->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'order_id' => 'required',
            'subtotal' => 'required',
            'pph23' => 'required',
            'ppn' => 'required',
            'total_pembayaran' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $month = Date::parse($request->tgl_invoice)->format('m');
        $year = Date::parse($request->tgl_invoice)->format('Y');
        switch($month){
            case '01':
                $romawi = 'I';
            break;
            case '02':
                $romawi = 'II';
            break;
            case '03':
                $romawi = 'III';
            break;
            case '04':
                $romawi = 'IV';
            break;
            case '05':
                $romawi = 'V';
            break;
            case '06':
                $romawi = 'VI';
            break;
            case '07':
                $romawi = 'VII';
            break;
            case '08':
                $romawi = 'VIII';
            break;
            case '09':
                $romawi = 'IX';
            break;
            case '10':
                $romawi = 'X';
            break;
            case '11':
                $romawi = 'XI';
            break;
            case '12':
                $romawi = 'XII';
            break;
        }
        $cekinvoice = Invoice::query()->orderBy('no_invoice','DESC')->first();
        if($cekinvoice){
            $code = intval(substr($cekinvoice->no_invoice,2));
            $newcode = str_pad($code+1,4,'0',STR_PAD_LEFT).'_INV-MJL_'.$romawi.'_'.$year;
        } else {
            $newcode = '0001'.'_INV-MJL_'.$month.'_'.$year;
        }
        foreach($request->get('order_id') as $od){
            $od_id = $od;
        }
        $transaction = Order::query()->where('order_id','=',$od_id)->first();
        $vendor = Vendors::query()->where('vendor_id','=',$transaction->vendor_id)->first();
        $invoice = Invoice::create([
            'uuid' => UUID::generateUuid(),
            'no_invoice' => $newcode,
            'tgl_invoice' => $request->tgl_invoice,
            'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo,
            'name_pt' => ucfirst($request->name_pt),
            'vendor_id' => $vendor->vendor_id,
            'payment_id' => $request->payment_id,
            'subtotal' => $request->subtotal,
            'pph23' => $request->pph23 ?? 0,
            'ppn' => $request->ppn ?? 0,
            'total_pembayaran' => $request->total_pembayaran,
            'description' => ucfirst($request->description),
        ]);
        if ($invoice) {
            $orderIds = $request->get('order_id');
            foreach ($orderIds as $orderId) {
                $transaction = Order::query()->where('order_id','=',$orderId)->first();
                $transaction->invoice_id = $invoice->invoice_id;
                $transaction->save();
            }
        }
        return Response::json(['status'=>201,'message'=>'Invoice berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::query()->where('uuid','=',$id)->first();
        $invoice->no_invoice = $request->no_invoice;
        $invoice->tgl_invoice = $request->tgl_invoice;
        $invoice->tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
        $invoice->name_pt = $request->name_pt;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->payment_id = $request->payment_id;
        $invoice->subtotal = $request->subtotal;
        $invoice->pph23 = $request->pph23;
        $invoice->ppn = $request->ppn;
        $invoice->total_pembayaran = $request->total_pembayaran;
        $invoice->description = $request->description;
        $invoice->sign = $request->sign;
        $invoice->updated_at = Date::Now();
        $invoice->save();
        return Response::json(['status'=>201,'message'=>'Invoice berhasil diupdate']);
    }

    public function delete(Request $request, $id)
    {
        $invoice = Invoice::query()->where('uuid', '=', $id)->first();
        if (!$invoice) {
            return Response::json(['status' => 404, 'message' => 'Invoice tidak ditemukan']);
        }
        $invoice->deleted_at = Date::Now();
        $invoice->save();
        (new Order())->updateWhere(
            ['invoice_id' => $invoice->invoice_id], 
            ['invoice_id' => null]
        );
        return Response::json(['status'=>200,'message'=>'Invoice berhasil dihapus']);
    }

    public function generatePDF(Request $request,$id)
    {
        $inv = Invoice::query()->select()->selectRaw('(SELECT SUM(orders.price) FROM orders WHERE orders.invoice_id = invoices.invoice_id) as total')
                                ->leftJoin('orders','orders.invoice_id','=','invoices.invoice_id')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','orders.vehicle_id')
                                ->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')
                                ->where('invoices.uuid','=',$id)->get();
        $pay = Payment::query()->first();
        if (!$inv) {
            die('Invoice tidak ditemukan');
        }
        $html = View::render('invoices/template-invoice', ['invoice' => $inv,'payment'=>$pay]);
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("invoice_{$inv[0]->invoice_id}.pdf", ["Attachment" => true]);
    }

    public function indexAP()
    {
        $payment = Payment::all();
        $vendor = OrderAP::query()->where('invoice_ap_id','=',null)
                                ->where('deleted_at','=',null)->get();
        return view('invoices/invoice-ap',['payment'=>$payment,'vendor'=>$vendor],'layout/app');
    }

    public function getInvoicesAP(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
                $invoice = InvoiceAP::query()->leftJoin('payments','payments.payment_id','=','invoices_ap.payment_id')
                                            ->where('invoices_ap.deleted_at','=',null)
                                            ->whereBetween('tgl_invoice',$request->startdate,$request->enddate)
                                            ->get();
                return DataTables::of($invoice)
                                    ->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function createAP(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'order_ap_id' => 'required',
            'subtotal' => 'required',
            'pph23' => 'required',
            'ppn' => 'required',
            'total_pembayaran' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $month = Date::parse($request->tgl_invoice)->format('m');
        $year = Date::parse($request->tgl_invoice)->format('Y');
        switch($month){
            case '01':
                $romawi = 'I';
            break;
            case '02':
                $romawi = 'II';
            break;
            case '03':
                $romawi = 'III';
            break;
            case '04':
                $romawi = 'IV';
            break;
            case '05':
                $romawi = 'V';
            break;
            case '06':
                $romawi = 'VI';
            break;
            case '07':
                $romawi = 'VII';
            break;
            case '08':
                $romawi = 'VIII';
            break;
            case '09':
                $romawi = 'IX';
            break;
            case '10':
                $romawi = 'X';
            break;
            case '11':
                $romawi = 'XI';
            break;
            case '12':
                $romawi = 'XII';
            break;
        }
        $cekinvoice = InvoiceAP::query()->orderBy('no_invoice','DESC')->first();
        if($cekinvoice){
            $code = intval(substr($cekinvoice->no_invoice,2));
            $newcode = str_pad($code+1,4,'0',STR_PAD_LEFT).'_INV-AP-MJL_'.$romawi.'_'.$year;
        } else {
            $newcode = '0001'.'_INV-AP-MJL_'.$month.'_'.$year;
        }
        foreach($request->get('order_ap_id') as $od){
            $od_id = $od;
        }
        $transaction = OrderAP::query()->where('order_ap_id','=',$od_id)->first();
        $invoice = InvoiceAP::create([
            'uuid' => UUID::generateUuid(),
            'no_invoice' => $newcode,
            'tgl_invoice' => $request->tgl_invoice,
            'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo,
            'name_pt' => ucfirst($request->name_pt),
            'vendor' => $transaction->vendor,
            'payment_id' => $request->payment_id,
            'subtotal' => $request->subtotal,
            'pph23' => $request->pph23 ?? 0,
            'ppn' => $request->ppn ?? 0,
            'total_pembayaran' => $request->total_pembayaran,
            'description' => ucfirst($request->description),
        ]);
        if ($invoice) {
            $orderIds = $request->get('order_ap_id');
            foreach ($orderIds as $orderId) {
                $transaction = OrderAP::query()->where('order_ap_id','=',$orderId)->first();
                $transaction->invoice_ap_id = $invoice->invoice_ap_id;
                $transaction->save();
            }
        }
        return Response::json(['status'=>201,'message'=>'Invoice berhasil dibuat']);
    }

    public function updateAP(Request $request, $id)
    {
        $invoice = InvoiceAP::query()->where('uuid','=',$id)->first();
        $invoice->no_invoice = $request->no_invoice;
        $invoice->tgl_invoice = $request->tgl_invoice;
        $invoice->tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
        $invoice->name_pt = $request->name_pt;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->payment_id = $request->payment_id;
        $invoice->subtotal = $request->subtotal;
        $invoice->pph23 = $request->pph23;
        $invoice->ppn = $request->ppn;
        $invoice->total_pembayaran = $request->total_pembayaran;
        $invoice->description = $request->description;
        $invoice->sign = $request->sign;
        $invoice->updated_at = Date::Now();
        $invoice->save();
        return Response::json(['status'=>201,'message'=>'Invoice berhasil diupdate']);
    }

    public function deleteAP(Request $request, $id)
    {
        $invoice = InvoiceAP::query()->where('uuid', '=', $id)->first();
        if (!$invoice) {
            return Response::json(['status' => 404, 'message' => 'Invoice tidak ditemukan']);
        }
        $invoice->deleted_at = Date::Now();
        $invoice->save();
        (new Order())->updateWhere(
            ['invoice_ap_id' => $invoice->invoice_ap_id], 
            ['invoice_ap_id' => null]
        );
        return Response::json(['status'=>200,'message'=>'Invoice berhasil dihapus']);
    }

    public function generatePDFAP(Request $request,$id)
    {
        $inv = InvoiceAP::query()->select()->selectRaw('(SELECT SUM(orders_ap.price) FROM orders_ap WHERE orders_ap.invoice_ap_id = invoices_ap.invoice_ap_id) as total')
                                ->leftJoin('orders_ap','orders_ap.invoice_ap_id','=','invoices_ap.invoice_ap_id')
                                ->where('invoices_ap.uuid','=',$id)->get();
        $pay = Payment::query()->first();
        if (!$inv) {
            die('Invoice tidak ditemukan');
        }
        $html = View::render('invoices/template-invoice-ap', ['invoice' => $inv,'payment'=>$pay]);
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("invoice_ap_{$inv[0]->invoice_ap_id}.pdf", ["Attachment" => true]);
    }
}
