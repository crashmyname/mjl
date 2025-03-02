<?php

namespace App\Controllers;

use App\Models\User;
use Support\BaseController;
use Support\DataTables;
use Support\Date;
use Support\Request;
use Support\Response;
use Support\Session;
use Support\UUID;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class UserController extends BaseController
{
    // Controller logic here
    public function index()
    {
        return view('users/user',[],'layout/app');
    }

    public function getUser(Request $request)
    {
        if(Request::isAjax()){
            $user = User::all();
            return DataTables::of($user)
                            ->make(true);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:5',
            'name' => 'required',
            'password' => 'required',
            'profile' => 'mime:jpg,jpeg,png',
            'role_id' => 'required',
        ]);
        if($validator){
            return Response::json(['status'=>500,'message'=>$validator]);
        }
        if($request->getClientOriginalName('profile')){
            $path = storage_path('profile-users');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = $request->getClientOriginalName('profile');
            $tempPath = $request->getPath('profile');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                $user = User::create([
                    'uuid' => UUID::generateUuid(),
                    'username' => $request->username,
                    'name' => $request->name,
                    'password' => password_hash($request->password,PASSWORD_BCRYPT),
                    'profile' => $fileName,
                    'role_id' => $request->role_id
                ]);
            }
        }
        return Response::json(['status'=>201,'message'=>'User Berhasil dibuat']);
    }

    public function update(Request $request,User $user, $id)
    {
        $user->query()->where('uuid','=',$id)->first();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->profile = $request->profile;
        $user->role_id = $request->role;
        $user->updated_at = Date::Now();
        $user->save();
        return Response::json(['status'=>201,'message'=>'User berhasil di update']);
    }

    public function delete(Request $request,$id)
    {
        $user = User::query()->where('uuid','=',$id)->first();
        $user->delete();
        return Response::json(['status'=>200,'message'=>'User Berhasil dihapus']);
    }
}
