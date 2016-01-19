<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(LoginRequest $request)
    {
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active'=>'1'],
            $request->remember_me)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->route('adminLogin')->with('login-error', 'Please Check your login data !');
    }

    public function doLogout()
    {
        \Auth::logout();
        return redirect()->route('adminLogin');
    }
}
