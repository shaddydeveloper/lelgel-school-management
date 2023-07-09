<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserLogin extends Controller
{
    public function userLogin(Request $request)
    {
        # code...
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
