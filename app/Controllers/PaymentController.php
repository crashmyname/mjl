<?php

namespace App\Controllers;

use App\Models\Payment;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class PaymentController extends BaseController
{
    // Controller logic here
    public function index()
    {
        return view('payments/payment',[],'layout/app');
    }

    public function getPayment(Request $request)
    {
        if(Request::isAjax()){
            $payment = Payment::query()->select()->where('deleted_at','=',null)->get();
            return DataTables::of($payment)->make(true);
        }
    }

    public function create(Request $request)
    {
        $payment = Payment::create([
            'no_rek' => $request->no_rek,
            'nama_rek' => $request->nama_rek,
            'bank_code' => $request->bank_code,
            'swift_code' => $request->swift_code,
        ]);
        return Response::json(['status'=>201,'message'=>'Payment berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->no_rek = $request->no_rek;
        $payment->nama_rek = $request->nama_rek;
        $payment->bank_code = $request->bank_code;
        $payment->swift_code = $request->swift_code;
        $payment->updated_at = Date::Now();
        $payment->save();
        return Response::json(['status'=>201,'message'=>'Payment berhasil diupdate']);
    }

    public function delete(Request $request,$id)
    {
        $payment = Payment::find($id);
        $payment->deleted_at = Date::Now();
        $payment->save();
        return Response::json(['status'=>200,'message'=>'Payment berhasil dihapus']);
    }
}
