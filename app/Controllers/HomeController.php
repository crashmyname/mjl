<?php

namespace App\Controllers;

use App\Models\Drivers;
use App\Models\Order;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vendors;
use Support\BaseController;
use Support\Date;
use Support\DB;
use Support\Request;
use Support\Response;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class HomeController extends BaseController
{
    // Controller logic here
    public function index(Request $request)
    {
        $user = User::query()->count();
        $vendor = Vendors::query()->count();
        $vehicle = Vehicle::query()->count();
        $driver = Drivers::query()->count();
        $monthlypo = Order::query()->whereMonth('tgl_pembuatan_po',Date::parse(Date::Now())->format('m'))->count();
        $dailypo = Order::query()->whereDate('tgl_pembuatan_po',Date::parse(Date::Now())->format('Y-m-d'))->count();
        return view('home/home',['user'=>$user,'vendor'=>$vendor,'vehicle'=>$vehicle,'driver'=>$driver,'mpo'=>$monthlypo,'dpo'=>$dailypo],'layout/app');
    }

    public function test()
    {
        $trans = Order::query()->leftJoin('vendors','vendors.vendor_id','=','orders.vendor_id')->where('order_id','=',1)->first()->formatWithRelations(['vendor' => ['vendor_id', 'company_name', 'address']]);
        return Response::json($trans);
    }
}
