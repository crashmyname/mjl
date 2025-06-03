<?php

namespace App\Controllers;

use App\Models\Price;
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

class PriceController extends BaseController
{
    public function getPrice(Request $request)
    {
        if(Request::isAjax()){
            $price = Price::query()->select('prices.uuid','origin_city','destination_city','min','max','status','price','prices.created_at','vehicles.plat_number','vehicles.truck_type','project')->leftJoin('vehicles','vehicles.vehicle_id','=','prices.vehicle_id')->where('prices.deleted_at','=',null)->get();
            return DataTables::of($price)->make(true);
        }
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'origin_city' => 'required',
            'destination_city' => 'required',
            'min' => 'required',
            'max' => 'required',
            'price' => 'required',
            'project' => 'required',
        ]);
        if($validate){
            return Response::json(['status'=>500,'message'=>$validate]);
        }
        $price = Price::create([
            'uuid' => UUID::generateUuid(),
            'vehicle_id' => $request->vehicle_id,
            'origin_city' => ucfirst($request->origin_city),
            'destination_city' => ucfirst($request->destination_city),
            'min' => $request->min,
            'max' => $request->max,
            'status' => $request->status,
            'price' => $request->price,
            'project' => ucfirst($request->project),
        ]);
        return Response::json(['status'=>201,'message'=>'Harga berhasil dibuat']);
    }

    public function import(Request $request)
    {
        $file = $request->file('fileprice');
        try{
            $spreadsheet = IOFactory::load($request->getPath('fileprice'));
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);
            array_shift($data);
            foreach($data as $index => $row){
                $vehicle = Vehicle::query()->where('plat_number','=',$row['A'])->first();
                Price::create([
                    'uuid' => UUID::generateUuid(),
                    'vehicle_id' => $vehicle->vehicle_id,
                    'origin_city' => $row['B'],
                    'destination_city' => $row['C'],
                    'min' => $row['D'],
                    'max' => $row['E'],
                    'status' => $row['F'],
                    'price' => $row['G'],
                    'project' => $row['H'],
                ]);
            }
            return Response::json(['status'=>201, 'message'=>'Sukses Import']);
        } catch(\Exception $e){
            return Response::json(['status'=>500,'message'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $price = Price::query()->where('uuid','=',$id)->first();
        $price->vehicle_id = $request->vehicle_id;
        $price->origin_city = $request->origin_city;
        $price->destination_city = $request->destination_city;
        $price->min = $request->min;
        $price->max = $request->max;
        $price->status = $request->status;
        $price->price = $request->price;
        $price->project = $request->project;
        $price->updated_at = Date::Now();
        $price->save();
        return Response::json(['status'=>201,'message'=>'Harga berhasil diupdate']);
    }

    public function delete($id)
    {
        $price = Price::query()->where('uuid','=',$id)->first();
        $price->deleted_at = Date::Now();
        $price->save();
        return Response::json(['status'=>200,'message'=>'Harga berhasil dihapus']);
    }
}
