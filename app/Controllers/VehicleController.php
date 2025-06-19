<?php

namespace App\Controllers;

use App\Models\Vehicle;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\UUID;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class VehicleController extends BaseController
{
    // Controller logic here
    public function index()
    {

    }

    public function getVehicle(Request $request)
    {
        if($request->status != 'All'){
            if(Request::isAjax()){
                $vehicle = Vehicle::query()->where('deleted_at','=',null)->where('status_vehicle','=',$request->status)->get();
                return DataTables::of($vehicle)->make(true);
            }
        } else {
            if(Request::isAjax()){
                $vehicle = Vehicle::query()->where('deleted_at','=',null)->get();
                return DataTables::of($vehicle)->make(true);
            }
        }
    }

    public function getVehicleData()
    {
        $vehicle = Vehicle::query()->where('deleted_at','=',null)->where('status_vehicle','=','External')->get();
        return Response::json(['status'=>200, 'data'=>$vehicle,'message'=>'success get data']);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'plat_number' => 'required',
            'truck_type' => 'required',
            'truck_sub_type' => 'required',
            'plat_color' => 'required'
        ]);
        $errors = $validator;
        $validateType = $request->getClientMimeType('stnk');
        $validateType1 = $request->getClientMimeType('kir');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('stnk') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['stnk' => ['File must be a valid image']]);
        }
        if($request->file('kir') && !in_array($validateType1,$allowedTypes)){
            $errors = array_merge($errors, ['kir' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('stnk') && $request->getClientOriginalName('kir')){
            $path = storage_path('document/data');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = $request->getClientOriginalName('stnk');
            $fileName1 = $request->getClientOriginalName('kir');
            $tempPath = $request->getPath('stnk');
            $tempPath1 = $request->getPath('kir');
            $destination = $path.'/'.$fileName;
            $destination1 = $path.'/'.$fileName1;

            if(move_uploaded_file($tempPath,$destination) && move_uploaded_file($tempPath1,$destination1)){
                Vehicle::create([
                    'uuid' => UUID::generateUuid(),
                    'plat_number' => $request->plat_number,
                    'truck_type' => ucfirst($request->truck_type),
                    'truck_sub_type' => ucfirst($request->truck_sub_type),
                    'plat_color' => $request->plat_color,
                    'status_vehicle' => $request->statusvehicle,
                    'stnk' => $fileName,
                    'kir' => $fileName1
                ]);
            }
        }
        return Response::json(['status'=>201,'message'=>'Vehcile berhasil dibuat']);
    }

    public function import(Request $request)
    {
        $file = $request->file('filevehicle');
        try{
            $spreadsheet = IOFactory::load($request->getPath('filevehicle'));
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);
            array_shift($data);
            foreach($data as $index => $row){
                Vehicle::create([
                    'uuid' => UUID::generateUuid(),
                    'plat_number' => $row['A'],
                    'truck_type' => $row['B'],
                    'truck_sub_type' => $row['C'],
                    'plat_color' => $row['D'],
                    'status_vehicle' => $row['E'],
                    'stnk' => null,
                    'kir' => null,
                ]);
            }
            return Response::json(['status'=>201, 'message'=>'Sukses Import']);
        } catch(\Exception $e){
            return Response::json(['status'=>500,'message'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::query()->where('uuid','=',$id)->first();
        $vehicle->plat_number = $request->plat_number;
        $vehicle->truck_type = $request->truck_type;
        $vehicle->truck_sub_type = $request->truck_sub_type;
        $vehicle->plat_color = $request->plat_color;
        $vehicle->status_vehicle = $request->statusvehicle;
        if($request->getClientOriginalName('stnk')){
            $path = storage_path('document/data');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$vehicle->stnk;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $vehicle->stnk = $request->getClientOriginalName('stnk');
            $tempPath = $request->getPath('stnk');
            $destination = $path.'/'.$vehicle->stnk;
            move_uploaded_file($tempPath,$destination);
        }
        if($request->getClientOriginalName('kir')){
            $path = storage_path('document/data');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$vehicle->kir;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $vehicle->kir = $request->getClientOriginalName('kir');
            $tempPath = $request->getPath('kir');
            $destination = $path.'/'.$vehicle->kir;
            move_uploaded_file($tempPath,$destination);
        }
        $vehicle->updated_at = Date::Now();
        $vehicle->save();
        return Response::json(['status'=>201,'message'=>'Success update']);
    }

    public function delete(Request $request, $id)
    {
        $vehicle = Vehicle::query()->where('uuid','=',$id)->first();
        $vehicle->deleted_at = Date::Now();
        $vehicle->save();
        return Response::json(['status'=>200,'Success delete']);
    }
}
