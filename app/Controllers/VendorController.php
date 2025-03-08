<?php

namespace App\Controllers;

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

class VendorController extends BaseController
{
    // Controller logic here
    public function index()
    {
        return view('shippers/shipper',[],'layout/app');
    }

    public function getShippers(Request $request)
    {
        if(Request::isAjax()){
            $vendor = Vendors::query()->where('deleted_at','=',null)->get();
            return DataTables::of($vendor)->make(true);
        }
    }

    public function create(Request $request)
    {
        $vendor = Vendors::create([
            'uuid' => UUID::generateUuid(),
            'company_name' => $request->company_name,
            'address' => $request->address,
            'sales' => $request->sales,
            'sales_support' => $request->sales_support,
            'email' => $request->email,
            'phone' => $request->phone,
            'npwp' => $request->npwp,
        ]);
        return Response::json(['status'=>201,'message'=>'Shippers Created']);
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendors::query()->where('uuid','=',$id)->first();
        $vendor->company_name = $request->company_name;
        $vendor->address = $request->address;
        $vendor->sales = $request->sales;
        $vendor->sales_support = $request->sales_support;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->npwp = $request->npwp;
        $vendor->updated_at = Date::Now();
        $vendor->save();
        return Response::json(['status'=>201,'message'=>'Shippers success update']);
    }

    public function delete(Request $request, $id)
    {
        $vendor = Vendors::query()->where('uuid','=',$id)->first();
        $vendor->deleted_at = Date::Now();
        $vendor->save();
        return Response::json(['status'=>200,'message'=>'Shippers success delete']);
    }
}
