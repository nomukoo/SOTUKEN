<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use App\Models\Staff;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function user_login(Request $request){
        $userID = $request->input('userID');
        $password = $request->input('password');
        $DB_userInfo_get = Patient::where('patient_ID',$userID)->where('patient_password',$password)->first();
        if($DB_userInfo_get != null){
            $request->session()->put('user_Info',$DB_userInfo_get);
            return view('top2');
        }else{

            return view('userlogin');
        }
    }


    public function emp_login(Request $request){
        $emp_ID = $request->input('emp_ID');
        $emp_password = $request->input('emp_password');
        $DB_empInfo_get = Staff::where('staff_ID',$emp_ID)->where('staff_password',$emp_password)->first();
        if($DB_empInfo_get != null){
            $request->session()->put('emp_Info',$DB_empInfo_get);
            return view('top');
        }else{

            return view('employee_login');
        }
    }

    public function admin_login(Request $request){
        $admin_ID = $request->input('admin_ID');
        $admin_password = $request->input('admin_password');
        $DB_adminInfo_get = Admin::where('admin_ID',$admin_ID)->where('admin_password',$admin_password)->first();
        if($DB_adminInfo_get != null){
            $request->session()->put('admin_Info',$DB_adminInfo_get);
            return view('admin_login');
        }else{

            return view('admin_login');
        }
    }

    public function user_logout(Request $request){
        $request->session()->flush();
        return view('userlogin');
    }

    public function emp_logout(Request $request){
        $request->session()->flush();
        return view('employee_login');
    }

    public function admin_logout(Request $request){
        $request->session()->flush();
        return view('admin_login');
    }
}
