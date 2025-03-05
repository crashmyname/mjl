<?php

namespace App\Controllers;

use App\Models\Price;
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
            $price = Price::query()->select('prices.uuid','origin_city','destination_city','min','max','status','price','prices.created_at','vehicles.plat_number','vehicles.truck_type')->leftJoin('vehicles','vehicles.vehicle_id','=','prices.vehicle_id')->where('prices.deleted_at','!=',null)->get();
            return DataTables::of($price)->make(true);
        }
    }

    public function create(Request $request)
    {
        $price = Price::create([
            'uuid' => UUID::generateUuid(),
            'vehicle_id' => $request->vehcile_id,
            'origin_city' => $request->origin_city,
            'destination_city' => $request->destination_city,
            'min' => $request->min,
            'max' => $request->max,
            'status' => $request->status,
            'price' => $request->price,
        ]);
        return Response::json(['status'=>201,'message'=>'Harga berhasil dibuat']);
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
        $price->updated_at = Date::Now();
        $price->save();
        return Response::json(['status'=>201,'message'=>'Harga berhasil diupdate']);
    }

    public function destroy($id)
    {
        $price = Price::query()->where('uuid','=',$id)->first();
        $price->deleted_at = Date::Now();
        $price->save();
        return Response::json(['status'=>200,'message'=>'Harga berhasil dihapus']);
    }
}
