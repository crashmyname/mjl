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
        $validator = Validator::make($request->all(),[
            'driver_name' => 'required',
            'driver_ksuid' => 'required',
            'phone_number' => 'required',
            'sim_type' => 'required'
        ]);
        $errors = $validator;
        $validateType = $request->getClientMimeType('ktp');
        $validateType1 = $request->getClientMimeType('sim');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('ktp') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['ktp' => ['File must be a valid image']]);
        }
        if($request->file('sim') && !in_array($validateType1,$allowedTypes)){
            $errors = array_merge($errors, ['sim' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('ktp') && $request->getClientOriginalName('sim')){
            $path = storage_path('document/data');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = $request->getClientOriginalName('ktp');
            $fileName1 = $request->getClientOriginalName('sim');
            $tempPath = $request->getPath('ktp');
            $tempPath1 = $request->getPath('sim');
            $destination = $path.'/'.$fileName;
            $destination1 = $path.'/'.$fileName1;

            if(move_uploaded_file($tempPath,$destination) && move_uploaded_file($tempPath1,$destination1)){
                $driver = Drivers::create([
                    'uuid' => UUID::generateUuid(),
                    'driver_name' => $request->driver_name,
                    'driver_ksuid' => $request->driver_ksuid,
                    'phone_number' => $request->phone_number,
                    'sim_type' => $request->sim_type,
                    'ktp' => $fileName,
                    'sim' => $fileName1,
                ]);
            }
        }
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
