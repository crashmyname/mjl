<?php

namespace App\Controllers;

use App\Models\Drivers;
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
            if($request->startdate && $request->enddate){
            $salary = Salary::query()
                                ->select('salary_id','salaries.uuid','drivers.driver_name','salary','tanggal','bukti','salaries.status','salaries.ppn','salaries.pph','salaries.buktipotong','salaries.tanggal_payment','sisa_bayar')
                                ->leftJoin('drivers','drivers.driver_id','=','salaries.driver_id')
                                ->where('salaries.deleted_at','=',null)
                                ->whereBetween('tanggal',$request->startdate,$request->enddate)
                                ->get();
                return DataTables::of($salary)->make(true);
            } else {
                return DataTables::of([])->make(true);
            }
        }
    }

    public function index()
    {
        $driver = Drivers::query()->select('driver_id','driver_name')->where('deleted_at','=',null)->get();
        return view('salaries/driver-salary',['driver'=>$driver],'layout/app');
    }

    public function create(Request $request)
    {
        // vd($request->all());
        $validate = Validator::make($request->all(),[
            'driver_id' => 'required',
            'salary' => 'required',
        ]);
        $errors = $validate;
        $validateType = $request->getClientMimeType('bukti');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('bukti') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['bukti' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('bukti')){
            $path = storage_path('document/data/gaji');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('bukti'));
            // $fileName1 = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('buktipotong'));
            $tempPath = $request->getPath('bukti');
            // $tempPath1 = $request->getPath('buktipotong');
            $destination = $path.'/'.$fileName;
            // $destination1 = $path.'/'.$fileName1;

            if(move_uploaded_file($tempPath,$destination)){
                Salary::create([
                    'uuid' => UUID::generateUuid(),
                    'driver_id' => $request->driver_id,
                    'tanggal' => $request->tanggal,
                    'salary' => $request->salary,
                    'sisa_bayar' => $request->salary-($request->salary*$request->pph),
                    'ppn' => $request->ppn,
                    'pph' => $request->pph,
                    'bukti' => $fileName,
                    'buktipotong' => null,
                    'status' => 'unpaid',
                    'created_at' => Date::Now(),
                    'updated_at' => Date::Now(),
                ]);
            }
        }
        return Response::json(['status'=>201,'message'=>'Gaji berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::query()->where('uuid','=',$id)->first();
        $salary->driver_id = $request->driver_id;
        $salary->tanggal = $request->tanggal;
        $salary->salary = $request->salary;
        if($request->getClientOriginalName('bukti')){
            $path = storage_path('document/data/gaji');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$salary->bukti;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $salary->bukti = $request->getClientOriginalName('bukti');
            $tempPath = $request->getPath('bukti');
            $destination = $path.'/'.$salary->bukti;
            move_uploaded_file($tempPath,$destination);
        }
        if($request->getClientOriginalName('buktipotong')){
            $path = storage_path('document/data/gaji');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$salary->buktipotong;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $salary->buktipotong = $request->getClientOriginalName('buktipotong');
            $tempPath = $request->getPath('buktipotong');
            $destination = $path.'/'.$salary->buktipotong;
            move_uploaded_file($tempPath,$destination);
        }
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
