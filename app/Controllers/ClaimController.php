<?php

namespace App\Controllers;

use App\Models\Claim;
use App\Models\Drivers;
use App\Models\Vehicle;
use App\Models\Vendors;
use Support\BaseController;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Date;
use Support\Response;
use Support\UUID;

class ClaimController extends BaseController
{
    // Controller logic here
    public function getClaim(Request $request)
    {
        if(Request::isAjax()){
            if($request->startdate && $request->enddate){
            $claim = Claim::query()
                                ->select('claim_id','claims.uuid','vehicles.plat_number','drivers.driver_name','vendors.company_name','jenis_claim','biaya','remark','sj','claims.status','claims.tanggal_claim')
                                ->leftJoin('drivers','drivers.driver_id','=','claims.driver_id')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','claims.vehicle_id')
                                ->leftJoin('vendors','vendors.vendor_id','=','claims.vendor_id')
                                ->where('claims.deleted_at','=',null)
                                ->whereBetween('tanggal_claim',$request->startdate,$request->enddate)
                                ->get();
            return DataTables::of($claim)->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function index()
    {
        $vehicle = Vehicle::query()->select('vehicle_id','plat_number','truck_type')->where('deleted_at','=',null)->get();
        $driver = Drivers::query()->select('driver_id','driver_name')->where('deleted_at','=',null)->get();
        $supplier = Vendors::query()->select('vendor_id','company_name')->where('deleted_at','=',null)->get();
        return view('claims/claim',['vehicle'=>$vehicle,'driver'=>$driver,'supplier'=>$supplier],'layout/app');
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'vendor_id' => 'required',
            'jenis_claim' => 'required',
            'biaya' => 'required',
            'remark' => 'required',
        ]);
        $errors = $validate;
        $validateType = $request->getClientMimeType('surat_jalan');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('surat_jalan') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['surat_jalan' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('surat_jalan')){
            $path = storage_path('document/data/claim');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('surat_jalan'));
            $tempPath = $request->getPath('surat_jalan');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                Claim::create([
                    'uuid' => UUID::generateUuid(),
                    'vehicle_id' => $request->vehicle_id,
                    'driver_id' => $request->driver_id,
                    'vendor_id' => $request->vendor_id,
                    'tanggal_claim' => $request->tanggal_claim,
                    'jenis_claim' => $request->jenis_claim,
                    'biaya' => $request->biaya,
                    'remark' => ucfirst($request->remark),
                    'sj' => $fileName,
                    'status' => 'unpaid',
                    'created_at' => Date::Now(),
                    'updated_at' => Date::Now(),
                ]);
            }
        }
        return Response::json(['status'=>201,'message'=>'Claim berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->jenis_claim = $request->jenis_claim;
        $claim->tanggal_claim = $request->tanggal_claim;
        $claim->biaya = $request->biaya;
        $claim->remark = $request->remark;
        $claim->status = $request->status;
        if($request->getClientOriginalName('surat_jalan')){
            $path = storage_path('document/data/claim');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$claim->sj;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $claim->sj = $request->getClientOriginalName('surat_jalan');
            $tempPath = $request->getPath('surat_jalan');
            $destination = $path.'/'.$claim->sj;
            move_uploaded_file($tempPath,$destination);
        }
        $claim->updated_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>201,'message'=>'Claim berhasil diupdate']);
    }

    public function delete($id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->deleted_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>200,'message'=>'Claim berhasil dihapus']);
    }
}
