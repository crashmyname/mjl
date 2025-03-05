<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Vehicle;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\UUID;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class DriverController extends BaseController
{
    // Controller logic here
    public function index()
    {
        $vehicle = Vehicle::query()->where('deleted_at','=',null)->get();
        return view('transporters/transporter',['vehicle'=>$vehicle],'layout/app');
    }

    public function getDriver(Request $request)
    {
        if(Request::isAjax()){
            $driver = Drivers::query()->where('deleted_at','=',null)->get();
            return DataTables::of($driver)->make(true);
        }
    }

    public function create(Request $request)
    {
        $driver = Drivers::create([
            'uuid' => UUID::generateUuid(),
            'driver_name' => $request->driver_name,
            'driver_ksuid' => $request->driver_ksuid,
            'phone_number' => $request->phone_number,
            'sim_type' => $request->sim_type,
            'ktp' => $request->ktp,
            'sim' => $request->sim,
        ]);
        return Response::json(['status'=>201,'message'=>'Driver Berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $driver = Drivers::query()->where('uuid','=',$id)->first();
        $driver->driver_name = $request->driver_name;
        $driver->driver_ksuid = $request->driver_ksuid;
        $driver->phone_number = $request->phone_number;
        $driver->sim_type = $request->sim_type;
        $driver->ktp = $request->ktp;
        $driver->sim = $request->sim;
        $driver->updated_at = Date::Now();
        $driver->save();
        return Response::json(['status'=>201,'message'=>'Driver berhasil diupdate']);
    }

    public function delete(Request $request, $id)
    {
        $driver = Drivers::query()->where('uuid','=',$id)->first();
        $driver->deleted_at = Date::Now();
        $driver->save();
        return Response::json(['status'=>200,'message'=>'Driver Berhasil dihapus']);
    }
}
