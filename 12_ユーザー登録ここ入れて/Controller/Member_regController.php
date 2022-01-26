<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Staff;


class Member_regController extends Controller
{
    public function user_page(){
        return view('userlogin');
    }
    
    public function member_comfirm(Request $request){
        $member_ID = $request->input('userID');
        $member_pass = $request->input('password');
        $member_comfirmpass = $request->input('password1');
        if($member_pass == $member_comfirmpass){
            $request->session()->put('userID',$member_ID);
            $request->session()->put('password',$member_pass);
            return view('member_comfirm');
        }else{
            $msg ='入力されたパスワードが一致しません';
            return view('mem_reg_error',[
                'msg' => $msg
            ]);
        }
    }
    public function member_reg(Request $request){

        $patient_list = Patient::all()->where('patient_ID', $request->session()->get('userID'))->first();
        if($patient_list !=null && [$request->session()->get('userID') === $patient_list->patient_ID]){
            $msg = '入力されたIDは既に使われています';
            return view('mem_reg_error',[
                'msg' => $msg ]);
        }else{
            $patient = new Patient();
            $patient->patient_ID = $request->session()->get('userID');
            $patient->patient_password =$request->session()->get('password');
            $patient->save();
            return view('member_reg_finish');
        }
    }

    public function emp_comfirm(Request $request){
        $member_ID = $request->input('empID');
        $member_pass = $request->input('password');
        $member_comfirmpass = $request->input('password1');
        if($member_pass == $member_comfirmpass){
            $request->session()->put('empID',$member_ID);
            $request->session()->put('emp_password',$member_pass);
            return view('member_comfirm');
        }else{
            $msg ='入力されたパスワードが一致しません';
            return view('mem_reg_error',[
                'msg' => $msg
            ]);
        }
    }
    public function emp_reg(Request $request){

        $staff_list = Staff::all()->where('staff_ID', $request->session()->get('empID'))->first();
        if($staff_list !=null && [$request->session()->get('empID') === $staff_list->staff_ID]){
            $msg = '入力されたIDは既に使われています';
            return view('mem_reg_error',[
                'msg' => $msg ]);
        }else{
            $staff = new Staff();
            $staff->staff_ID = $request->session()->get('empID');
            $staff->staff_password =$request->session()->get('emp_password');
            $staff->save();
            return view('member_reg_finish');
        }
    }
}
