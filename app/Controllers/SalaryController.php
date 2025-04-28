<?php

namespace App\Controllers;

use App\Models\Salary;
use Support\BaseController;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Date;
use Support\Response;
use Support\UUID;

class SalaryController extends BaseController
{
    // Controller logic here
    public function getSalary(Request $request)
    {
        if(Request::isAjax()){
            $salary = Salary::query()
                                ->select('salary_id','salaries.uuid','drivers.driver_name','salary','tanggal','bukti','salaries.status')
                                ->leftJoin('drivers','drivers.driver_id','=','salaries.driver_id')
                                ->where('salaries.deleted_at','=',null)
                                ->get();
            return DataTables::of($salary)->make(true);
        }
    }

    public function index()
    {
        return view('salaries/salary',[],'layout/app');
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
        Salary::create([
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
        $salary = Salary::query()->where('uuid','=',$id)->first();
        $salary->driver_id = $request->driver_id;
        $salary->tanggal = $request->tanggal;
        $salary->bukti = $request->bukti;
        $salary->status = $request->status;
        $salary->updated_at = Date::Now();
        $salary->save();
        return Response::json(['status'=>201,'message'=>'Gaji berhasil diupdate']);
    }

    public function delete($id)
    {
        $salary = Salary::query()->where('uuid','=',$id)->first();
        $salary->deleted_at = Date::Now();
        $salary->save();
        return Response::json(['status'=>200,'message'=>'Gaji berhasil dihapus']);
    }
}
