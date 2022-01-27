<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function user_logout(Request $request){
        $request->session()->flush();
        return view('userlogin');
    }

    public function emp_logout(Request $request){
        $request->session()->flush();
        return view('after_logout');
    }

    public function admin_logout(Request $request){
        $request->session()->flush();
        return view('admin_login');
    }
}
