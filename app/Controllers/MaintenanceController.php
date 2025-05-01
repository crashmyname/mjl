<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Maintenance;
use App\Models\Vehicle;
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

    public function index()
    {
        $vehicle = Vehicle::query()->select('plat_number','truck_type','vehicle_id')->get();
        return view('maintenance/maintenance',['vehicle'=>$vehicle],'layout/app');
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
        $errors = $validate;
        $validateType = $request->getClientMimeType('bon');
        $validateType1 = $request->getClientMimeType('bukti');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('bon') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['bon' => ['File must be a valid image']]);
        }
        if($request->file('bukti') && !in_array($validateType1,$allowedTypes)){
            $errors = array_merge($errors, ['bukti' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('bon') && $request->getClientOriginalName('bukti')){
            $path = storage_path('document/data/maintenance');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('bon'));
            $fileName1 = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('bukti'));
            $tempPath = $request->getPath('bon');
            $tempPath1 = $request->getPath('bukti');
            $destination = $path.'/'.$fileName;
            $destination1 = $path.'/'.$fileName1;

            if(move_uploaded_file($tempPath,$destination) && move_uploaded_file($tempPath1,$destination1)){
                $mtc = Maintenance::create([
                    'uuid' => UUID::generateUuid(),
                    'vehicle_id' => $request->vehicle_id,
                    'tanggal' => $request->tanggal,
                    'description' => $request->description,
                    'sparepart' => $request->sparepart,
                    'harga' => $request->harga,
                    'jasa' => $request->jasa,
                    'bon' => $fileName,
                    'bukti' => $fileName1,
                    'total' => $request->total,
                    'status' => $request->status,
                    'created_at' => Date::Now(),
                    'updated_at' => Date::Now(),
                ]);
            }
        }
        
        return Response::json(['status'=>201,'message'=>'Maintenance berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $mtc = Maintenance::query()->where('uuid','=',$id)->first();
        $mtc->tanggal = $request->tanggal;
        $mtc->description = $request->description;
        $mtc->sparepart = $request->sparepart;
        $mtc->harga = $request->harga;
        $mtc->jasa = $request->jasa;
        if($request->getClientOriginalName('bukti')){
            $path = storage_path('document/data/maintenance');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$mtc->bukti;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $mtc->bukti = $request->getClientOriginalName('bukti');
            $tempPath = $request->getPath('bukti');
            $destination = $path.'/'.$mtc->bukti;
            move_uploaded_file($tempPath,$destination);
        }
        if($request->getClientOriginalName('bon')){
            $path = storage_path('document/data/maintenance');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$mtc->bon;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $mtc->bon = $request->getClientOriginalName('bon');
            $tempPath = $request->getPath('bon');
            $destination = $path.'/'.$mtc->bon;
            move_uploaded_file($tempPath,$destination);
        }
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
