<?php

namespace App\Controllers;

use App\Models\User;
use Support\Auth;
use Support\BaseController;
use Support\Request;
use Support\Response;
use Support\Session;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class AuthController extends BaseController
{
    // Controller logic here
    public function index()
    {
        return view('auth/login');
    }

    public function onLogin(Request $request)
    {
        $credentials = [
            'identifier' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            if(Request::isAjax()){       
                return Response::json(['status'=>200,'message'=>'Berhasil login']);
            }
        }
        // return redirect('/sign-in');
        if(Request::isAjax()){
            return Response::json(['status'=>401, 'message'=>'Username atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        Session::destroy();
        return redirect('/sign-in');
    }
}
