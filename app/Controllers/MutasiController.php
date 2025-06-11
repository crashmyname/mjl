<?php

namespace App\Controllers;

use App\Models\RekeningKoran;
use App\Models\SaldoAwal;
use App\Models\Transactions;
use Support\BaseController;
use Support\Date;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Response;

class MutasiController extends BaseController
{
    // Controller logic here
    public function getRekening(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
                $rekkoran = Transactions::query()
                                    ->select('transaction_id',
                                            'transaction.uuid',
                                            'reference_table',
                                            'reference_id',
                                            'reff',
                                            'payments.nama_bank',
                                            'payments.no_rek',
                                            'payments.nama_rek',
                                            'transaction_date',
                                            'jenis_transaction',
                                            'type_transaction',
                                            'amount',
                                            'description',
                                            'status')
                                    ->leftJoin('payments','payments.payment_id','=','transaction.payment_id')
                                    ->where('transaction.deleted_at','=',null)
                                    ->whereBetween('transaction_date',$request->startdate,$request->enddate)
                                    ->get();
                return DataTables::of($rekkoran)->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
            // Baru code sampe sini belum crud nya
        }
    }

    public function index()
    {
        return view('payments/mutation',[],'layout/app');
    }

    public function getPDF(Request $request,$startdate,$enddate)
    {
        $transactions = Transactions::query()->leftJoin('payments','payments.payment_id','=','transaction.payment_id')->whereBetween('transaction_date',$startdate,$enddate)->orderBy('transaction_date','ASC')->get();
        $saldoawal = SaldoAwal::query()->whereMonth('tanggal_saldo_awal',Date::parse($startdate)->format('m'))->whereYear('tanggal_saldo_awal',Date::parse($startdate)->format('Y'))->first();
        $balance = $saldoawal->saldo_awal ?? 0;
        return view('payments/balance',['startdate'=>$startdate,'enddate'=>$enddate,'transactions'=>$transactions,'balance'=>$balance]);
    }

    public static function getData(Request $request)
    {
        $saldoawal = SaldoAwal::query()->whereMonth('tanggal_saldo_awal',Date::parse($request->startdate)->format('m'))
                                ->whereYear('tanggal_saldo_awal',Date::parse($request->startdate)->format('Y'))
                                ->first();
        $transaction = Transactions::query()->whereBetween('transaction_date',$request->startdate,$request->enddate)->get();
        $beginingSaldo = $saldoawal->saldo_awal ?? 0;
        $currentSaldo = $beginingSaldo;
        foreach($transaction as $data){
            if($data->type_transaction == 'income'){
                $currentSaldo += $data->amount;
            } else if($data->type_transaction == 'outcome'){
                $currentSaldo -= $data->amount;
            }
        }
        $begining = $beginingSaldo;
        $last = $currentSaldo;
        return Response::json(['status'=>200,'message'=>'success','begining'=>$begining,'last'=>$last]);
    }

}
