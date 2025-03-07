<?php

namespace App\Controllers;

use App\Models\Vehicle;
use Support\BaseController;
use Support\DataTables;
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
        if(Request::isAjax()){
            $vehicle = Vehicle::query()->where('deleted_at','=',null)->get();
            return DataTables::of($vehicle)->make(true);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'plat_number' => 'required',
            'truck_type' => 'required',
            'truck_sub_type' => 'required',
            'plat_color' => 'required'
        ]);
        if($validator){
            return Response::json(['status'=>500,'message'=>$validator]);
        }
        Vehicle::create([
            'uuid' => UUID::generateUuid(),
            'plat_number' => $request->plat_number,
            'truck_type' => $request->truck_type,
            'truck_sub_type' => $request->truck_sub_type,
            'plat_color' => $request->plat_color,
            'stnk' => $request->stnk,
            'kir' => $request->kir
        ]);
        return Response::json(['status'=>201,'message'=>'Vehcile berhasil dibuat']);
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        
    }
}
