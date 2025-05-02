<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Maintenance;
use App\Models\Price;
use App\Models\Transactions;
use App\Models\Vehicle;
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

class TransactionController extends BaseController
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
            $orders = Transactions::query()->selectRaw('orders.uuid')
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
        $price = Transactions::query()->where('order_id','=',$data)->first();
        return Response::json(['status'=>200,'message'=>'success','data'=>$price->toArray()]);
    }

    public function generatePO(Request $request)
    {
        $generatePO = Transactions::query()->orderBy('no_po','DESC')->first();
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
        $order = Transactions::query()
                                ->leftJoin('drivers','drivers.driver_id','=','orders.driver_id')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','orders.vehicle_id')
                                ->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')
                                ->where('no_po','=',$nopo)->first();
        return view('transactions/detailorders',['order'=>$order],'layout/app');
    }

    public function createMaintenance(Request $request)
    {
        $cekdata = Maintenance::query()->where('maintenance_id','=',$request->maintenance)->first();
        if($cekdata){
            $transaction = Transactions::create([
                'uuid' => UUID::generateUuid(),
                'reference_table' => 'maintenance',
                'reference_id' => $cekdata->maintenance_id,
                'jenis_transaction' => 'Repair',
                'type_transaction' => 'OUT',
                'tanggal' => $request->tanggal,
                'total' => $request->total,
                'status' => $request->status,
                'created_at' => Date::Now(),
                'updated_at' => Date::Now(),
            ]);
            $cekdata->update([
                'status' => $request->status,
                'updated_at' => Date::Now(),
            ]);
        }
        return Response::json(['status'=>201,'message'=>'Payment berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $orders = Transactions::query()->where('uuid','=',$id)->first();
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
        $orders = Transactions::query()->where('no_po','=',$po)->first();
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
        $orders = Transactions::query()->where('uuid','=',$id)->first();
        $orders->deleted_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Order berhasil dihapus']);
    }
}
