<?php

namespace App\Controllers;

use App\Models\Invoice;
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
        return view('invoices/invoice',[],'layout/app');
    }

    public function getInvoices(Request $request)
    {
        if(Request::isAjax()){
            $invoice = Invoice::all();
            return DataTables::of($invoice)
                                ->make(true);
        }
    }

    public function create(Request $request)
    {
        $invoice = Invoice::create([
            'uuid' => UUID::generateUuid(),
            'no_invoice' => $request->no_invoice,
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
