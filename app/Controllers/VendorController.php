<?php

namespace App\Controllers;

use App\Models\NVendor;
use App\Models\Vendors;
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
            'company_name' => ucfirst($request->company_name),
            'address' => ucfirst($request->address),
            'sales' => ucfirst($request->sales),
            'sales_support' => ucfirst($request->sales_support),
            'email' => $request->email,
            'phone' => $request->phone,
            'npwp' => $request->npwp,
        ]);
        return Response::json(['status'=>201,'message'=>'Shippers Created']);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        try{
            $spreadsheet = IOFactory::load($request->getPath('file'));
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);
            array_shift($data);
            foreach($data as $index => $row){
                Vendors::create([
                    'uuid' => UUID::generateUuid(),
                    'company_name' => $row['A'],
                    'address' => $row['B'],
                    'sales' => $row['C'],
                    'sales_support' => $row['D'],
                    'email' => $row['E'],
                    'phone' => $row['F'],
                    'npwp' => $row['G'],
                ]);
            }
            return Response::json(['status'=>201, 'message'=>'Sukses Import']);
        } catch(\Exception $e){
            return Response::json(['status'=>500,'message'=>$e->getMessage()]);
        }
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

    public function indexVendor()
    {
        return view('vendors/vendor',[],'layout/app');
    }

    public function getVendor(Request $request)
    {
        if(Request::isAjax()){
            $vendor = NVendor::query()->where('deleted_at','=',null)->get();
            return DataTables::of($vendor)->make(true);
        }
    }

    public function createVendor(Request $request)
    {
        $vendor = NVendor::create([
            'uuid' => UUID::generateUuid(),
            'nama_vendor' => ucfirst($request->nama_vendor),
            'alias' => ucfirst($request->alias),
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return Response::json(['status'=>201,'message'=>'Vendor Created']);
    }
    
    public function importVendor(Request $request)
    {
        $file = $request->file('file');
        try{
            $spreadsheet = IOFactory::load($request->getPath('file'));
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);
            array_shift($data);
            foreach($data as $index => $row){
                NVendor::create([
                    'uuid' => UUID::generateUuid(),
                    'nama_vendor' => $row['A'],
                    'alias' => $row['B'],
                    'email' => $row['C'],
                    'phone' => $row['D'],
                ]);
            }
            return Response::json(['status'=>201, 'message'=>'Sukses Import']);
        } catch(\Exception $e){
            return Response::json(['status'=>500,'message'=>$e->getMessage()]);
        }
    }

    public function updateVendor(Request $request, $id)
    {
        $vendor = NVendor::getID($id);
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alias = $request->alias;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->updated_at = Date::Now();
        $vendor->save();
        return Response::json(['status'=>201,'message'=>'Vendor success update']);
    }

    public function deleteVendor(Request $request, $id)
    {
        $vendor = NVendor::getID($id);
        $vendor->deleted_at = Date::Now();
        $vendor->save();
        return Response::json(['status'=>200,'message'=>'Vendor success delete']);
    }
    
}
