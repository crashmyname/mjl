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
    public function getSalary(Request $request)
    {
        if(Request::isAjax()){
            $salary = Claim::query()
                                ->select('claim_id','claims.uuid','vehicles.plat_number','drivers.driver_name','vendors.company_name','jenis_claim','biaya','remark','sj','claims.status')
                                ->leftJoin('drivers','drivers.driver_id','=','salaries.driver_id')
                                ->leftJoin('vehicles','vehicles.vehicle_id','=','claims.vehicle_id')
                                ->leftJoin('vendors','vendors.vendor_id','=','claims.vendor_id')
                                ->where('claims.deleted_at','=',null)
                                ->get();
            return DataTables::of($salary)->make(true);
            // Baru code sampe sini belum crud nya
        }
    }

    public function index()
    {
        $vehicle = Vehicle::query()->select('vehicle_id','plat_number','truck_type')->get();
        $driver = Drivers::query()->select('driver_id','driver_name')->get();
        $supplier = Vendors::query()->select('vendor_id','company_name')->get();
        return view('claims/claim',['vehicle'=>$vehicle,'driver'=>$driver,'supplier'=>$supplier],'layout/app');
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'driver_id' => 'required',
            'salary' => 'required',
            'tanggal' => 'required',
            'bukti' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        Claim::create([
            'uuid' => UUID::generateUuid(),
            'driver_id' => $request->driver_id,
            'tanggal' => $request->tanggal,
            'bukti' => $request->bukti,
            'status' => $request->status,
            'created_at' => Date::Now(),
            'updated_at' => Date::Now(),
        ]);
        return Response::json(['status'=>201,'message'=>'Gaji berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->driver_id = $request->driver_id;
        $claim->tanggal = $request->tanggal;
        $claim->bukti = $request->bukti;
        $claim->status = $request->status;
        $claim->updated_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>201,'message'=>'Gaji berhasil diupdate']);
    }

    public function delete($id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->deleted_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>200,'message'=>'Gaji berhasil dihapus']);
    }
}
