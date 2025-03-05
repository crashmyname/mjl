<?php

namespace App\Controllers;

use App\Models\Vehicle;
use Support\BaseController;
use Support\DataTables;
use Support\Request;
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

    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        
    }
}
