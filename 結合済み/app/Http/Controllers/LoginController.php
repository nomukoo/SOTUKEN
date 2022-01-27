<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Defrost;
use App\Models\PlannedDisposal;
use App\Models\Disposal;
use App\Models\Lot;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            $today =Carbon::now()->toDateString();
            $DB_vaccine_time_get = Defrost::where('expair','<',$today)->get();
            $DB_FrozenVaccine_time_get = Lot::where('lot_limit','<',$today)->get();
            if($DB_vaccine_time_get != null){
                foreach($DB_vaccine_time_get as $list){
                    $Disposal_lot_number = Disposal::where('lot_number',$list['lot_number'])->get();
                    if(count($Disposal_lot_number) == 0){
                        $DB_PlannedDisposal = new PlannedDisposal();
                        $DB_PlannedDisposal->wakuchin_ID = $list['wakuchin_ID'];
                        $DB_PlannedDisposal->lot_number = $list['lot_number'];
                        $DB_PlannedDisposal->hospital_ID = $list['hospital_ID'];
                        $DB_PlannedDisposal->expair = $list['expair'];
                        $DB_PlannedDisposal->total = $list['defrost_total'];
                        $DB_PlannedDisposal->save();
                    }else{
                        continue;
                    }
                }
                Defrost::where('expair','<',$today)->delete();
            }
            
            if($DB_FrozenVaccine_time_get !=null) {
                
                    foreach($DB_FrozenVaccine_time_get as $list){
                        $PlannedDisposal_lot_number = PlannedDisposal::where('lot_number',$list['lot_number'])->get();
                        $Disposal_lot_number = Disposal::where('lot_number',$list['lot_number'])->get();
                        if(count($PlannedDisposal_lot_number) == 0 && count($Disposal_lot_number) == 0 ){
                            $DB_PlannedDisposal = new PlannedDisposal();
                            $DB_PlannedDisposal->lot_number = $list['lot_number'];
                            $DB_PlannedDisposal->expair = $list['lot_limit'];
                            $DB_PlannedDisposal->save();
                        }else{
                            continue;
                        }
                    }
               
            }   
            return redirect('/');
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

    
}
