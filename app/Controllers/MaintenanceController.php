<?php

namespace App\Controllers;

use App\Models\Maintenance;
use Support\BaseController;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Date;
use Support\Response;
use Support\UUID;

class MaintenanceController extends BaseController
{
    // Controller logic here
    public function getMaintenance(Request $request)
    {
        if(Request::isAjax()){
            $mtc = Maintenance::query()
                                ->select('maintenance_id','maintenances.uuid','tanggal','vehicles.plat_number','vehicles.truck_type','maintenances.description','sparepart','harga','jasa','bon','bukti','maintenances.total','maintenances.status')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','maintenances.vehicle_id')
                                ->where('maintenances.deleted_at','=',null)
                                ->get();
            return DataTables::of($mtc)->make(true);
        }
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'tanggal' => 'required',
            'sparepart' => 'required',
            'harga' => 'required',
            'jasa' => 'required',
            'total' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $mtc = Maintenance::create([
            'uuid' => UUID::generateUuid(),
            'vehicle_id' => $request->vehicle_id,
            'tanggal' => $request->tanggal,
            'description' => $request->description,
            'sparepart' => $request->sparepart,
            'harga' => $request->harga,
            'jasa' => $request->jasa,
            'bon' => $request->bon,
            'bukti' => $request->bukti,
            'total' => $request->total,
            'status' => $request->status,
            'created_at' => Date::Now(),
            'updated_at' => Date::Now(),
        ]);
        return Response::json(['status'=>201,'message'=>'Maintenance berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $mtc = Maintenance::query()->where('uuid','=',$id)->first();
        $mtc->vehicle_id = $request->vehicle_id;
        $mtc->tanggal = $request->tanggal;
        $mtc->description = $request->description;
        $mtc->sparepart = $request->sparepart;
        $mtc->harga = $request->harga;
        $mtc->jasa = $request->jasa;
        $mtc->bon = $request->bon;
        $mtc->bukti = $request->bukti;
        $mtc->total = $request->total;
        $mtc->status = $request->status;
        $mtc->updated_at = Date::Now();
        $mtc->save();
        return Response::json(['status'=>201,'message'=>'Maintenance berhasil diupdate']);
    }

    public function delete($id)
    {
        $mtc = Maintenance::query()->where('uuid','=',$id)->first();
        $mtc->deleted_at = Date::Now();
        $mtc->save();
        return Response::json(['status'=>200,'message'=>'Maintenance berhasil dihapus']);
    }
}
