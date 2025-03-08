<?php

namespace App\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Transactions;
use App\Models\Vendors;
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
        $vendor = Transactions::all();
        return view('invoices/invoice',['payment'=>$payment,'vendor'=>$vendor],'layout/app');
    }

    public function getInvoices(Request $request)
    {
        if(Request::isAjax()){
            $invoice = Invoice::query()->selectRaw('invoices.uuid')->leftJoin('vendors','vendors.vendor_id','=','invoices.vendor_id')
                                        ->leftJoin('payments','payments.payment_id','=','invoices.payment_id')
                                        ->where('invoices.deleted_at','=',null)
                                        ->get();
            return DataTables::of($invoice)
                                ->make(true);
        }
    }

    public function create(Request $request)
    {
        // var_dump($request);
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
        $invoice = Invoice::create([
            'uuid' => UUID::generateUuid(),
            'no_invoice' => $newcode,
            'tgl_invoice' => $request->tgl_invoice,
            'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo,
            'name_pt' => $request->name_pt,
            'vendor_id' => $request->vendor_id,
            'payment_id' => $request->payment_id,
            'subtotal' => $request->subtotal,
            'pph23' => $request->pph23,
            'ppn' => $request->ppn,
            'total_pembayaran' => $request->total_pembayaran,
            'description' => $request->description,
            'sign' => $request->sign,
        ]);
        if ($invoice) {
            $orderIds = $request->order_id;
            foreach ($orderIds as $orderId) {
                Transactions::query()->where('order_id','=',$orderId)->update([
                    'invoice_id' => $invoice->invoice_id
                ]);
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
        $invoice = Invoice::query()->where('uuid','=',$id)->first();
        $invoice->deleted_at = Date::Now();
        $invoice->save();
        return Response::json(['status'=>200,'message'=>'Invoice berhasil dihapus']);
    }
}
