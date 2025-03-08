<?php

namespace App\Controllers;

use App\Models\Drivers;
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
        $vendor = Vendors::all();
        $vehicle = Vehicle::all();
        $driver = Drivers::all();
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
        $price = Vehicle::query()->leftJoin('prices','prices.vehicle_id','=','vehicles.vehicle_id')->where('vehicles.vehicle_id','=',$data)->first();
        return Response::json(['status'=>200,'message'=>'success','data'=>$price->toArray()]);
    }

    public function create(Request $request)
    {
        $orders = Transactions::create([
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
            'status' => $request->status,
        ]);
        return Response::json(['status'=>201,'message'=>'Order berhasil dibuat']);
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

    public function delete(Request $request, $id)
    {
        $orders = Transactions::query()->where('uuid','=',$id)->first();
        $orders->deleted_at = Date::Now();
        $orders->save();
        return Response::json(['status'=>200,'message'=>'Order berhasil dihapus']);
    }
}
