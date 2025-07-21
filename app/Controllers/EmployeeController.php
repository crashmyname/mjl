<?php

namespace App\Controllers;

use App\Models\Employees;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class EmployeeController extends BaseController
{
    // Controller logic here
    public function index()
    {
        return view('employees/employee',[],'layout/app');
    }

    public function getEmployee(Request $request)
    {
        if(Request::isAjax()){
            $employee = Employees::all();
            return DataTables::of($employee)
                ->make(true);
        }
    }

    public function create(Request $request)
    {
        $emp = Employees::create([
            'no_karyawan' => $request->no_karyawan,
            'nama_karyawan' => $request->nama_karyawan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'section' => $request->section,
            'jabatan' => $request->jabatan,
            'created_at' => Date::Now(),
            'updated_at' => Date::Now(),
        ]);
        return Response::json(['status' => 201, 'message' => 'Employee created']);
    }

    public function update(Request $request, $id)
    {
        $emp = Employees::find($id);
        $emp->no_karyawan = $request->no_karyawan;
        $emp->nama_karyawan = $request->nama_karyawan;
        $emp->tempat_lahir = $request->tempat_lahir;
        $emp->tgl_lahir = $request->tgl_lahir;
        $emp->section = $request->section;
        $emp->jabatan = $request->jabatan;
        $emp->updated_at = Date::Now();
        $emp->save();
        return Response::json(['status' => 201, 'message' => 'Employee Upddated']);
    }

    public function delete(Request $request, $id)
    {
        $emp = Employees::find($id);
        $emp->delete();
        return Response::json(['status' => 200, 'message' => 'Employee Deleted']);
    }
}
