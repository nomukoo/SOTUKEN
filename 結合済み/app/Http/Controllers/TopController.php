<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function disp_top(Request $request){
        $emp_info = $request->session()->get('emp_Info');
        if($emp_info != null){
            return view('top');
        } else {
            return view('employee_login');
        }
        
    }
}
