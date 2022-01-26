<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospital;
use App\Models\Wakuchin;
use App\Models\Yoyaku;
use App\Models\Yoyaku_meisai;
use App\Models\Patient;

class yoyakuController extends Controller
{
	
	public function move()
	{
		return view('yoyaku');
	}

	public function y_calendar()
	{
		return view('y_calendar');
	}

	public function hospitals(Request $request)
	{
		$hospital = hospital::get();
		$request->session()->put('date_val',$request->input('date_val'));
        return view('y_hospital', [
            "hospitals" => $hospital
        ]);	
	}

	public function times(Request $request)
	{
		$request->session()->put('hospital_name',$request->input('hospital_name'));
		return view('yoyaku_time2');

	}

	public function infos(Request $request)
	{
		$wakuchin = Wakuchin::get();
		$request->session()->put('time',$request->input('time'));
		return view('yoyaku_info2', [
            "vaccine" => $wakuchin
        ]);
	}

	public function check(Request $request)
	{
		$request->session()->put('ticketnumber',$request->input('ticketnumber'));
		$request->session()->put('sei',$request->input('sei'));
		$request->session()->put('mei',$request->input('mei'));
		$request->session()->put('seikana',$request->input('seikana'));
		$request->session()->put('meikana',$request->input('meikana'));
		$request->session()->put('year',$request->input('year'));
		$request->session()->put('address_num',$request->input('address_num'));
		$request->session()->put('address',$request->input('address'));
		$request->session()->put('tel',$request->input('tel'));
		$request->session()->put('wakuchin',$request->input('wakuchin'));
		return view('y_check2');

	}

	public function comp(Request $request)
	{
		
		$booking_detail = new Yoyaku();
		$booking2 = new Yoyaku_meisai();
		$booking3 = new Patient();
		$patient_ID = $request->session()->get('user_Info');

		//monshinDB
		//yoyakuDB
		$hospitalID_get_list = hospital::where('hospital_name', $request->session()->get('hospital_name'))->first(['hospital_ID']);
		$hospitalID_get =$hospitalID_get_list['hospital_ID'];

		$booking_detail->yoyaku_date = $request->session()->get('date_val');
		$booking_detail->yoyaku_time = $request->session()->get('time');
		$booking_detail->patient_ID  = $patient_ID['patient_ID'];
		$booking_detail->hospital_Id = $hospitalID_get;
		$booking_detail->uketuke_flag = 0;
		$booking_detail->save();

		$last_insert_id_list = Yoyaku::where('patient_ID',$patient_ID['patient_ID'])->first(['yoyaku_ID']);


		//patientDB  予約者情報入力時に入力したものにupdateされるので新規登録者でない場合は入力に注意
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_sei' => $request->session()->get('sei')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_mei' => $request->session()->get('mei')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_address' => $request->session()->get('address')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_tell' => $request->session()->get('tel')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_birth' => $request->session()->get('year')]); 
		

		
		//yoyaku_meisaisDB 
		$booking2->yoyaku_ID = $last_insert_id_list['yoyaku_ID'];

		$wakuchinID_get_list = Wakuchin::where('wakuchin_name',$request->session()->get('wakuchin'))->first(['wakuchin_ID']);
		$wakuchinID_get =$wakuchinID_get_list['wakuchin_ID'];
		$booking2->wakuchin_ID = $wakuchinID_get;
		$booking2->save();

		return view('yoyaku_Conp');
	}

	public function today_reserve_hospital(Request $request){
		
		$hospital = hospital::where('hospital_ID',$request->input('hospital'))->get();
		$request->session()->put('today_hospital',$hospital);
		return view('yoyaku_time')->with('hospital',$hospital);
	}

	public function today_infos(Request $request)
	{
		$wakuchin = Wakuchin::get();
		$request->session()->put('today_time',$request->input('time'));
		return view('yoyaku_info', [
            "vaccine" => $wakuchin
        ]);
	}

	public function today_check(Request $request)
	{
		$request->session()->put('T_ticketnumber',$request->input('ticketnumber'));
		$request->session()->put('T_sei',$request->input('sei'));
		$request->session()->put('T_mei',$request->input('mei'));
		$request->session()->put('T_seikana',$request->input('seikana'));
		$request->session()->put('T_meikana',$request->input('meikana'));
		$request->session()->put('T_year',$request->input('year'));
		$request->session()->put('T_address_num',$request->input('address_num'));
		$request->session()->put('T_address',$request->input('address'));
		$request->session()->put('T_tel',$request->input('tel'));
		$request->session()->put('T_wakuchin',$request->input('wakuchin'));
		return view('y_check');

	}

	public function today_comp(Request $request)
	{
		
		$booking_detail = new Yoyaku();
		$booking2 = new Yoyaku_meisai();
		$booking3 = new Patient();
		$patient_ID = $request->session()->get('user_Info');
		$hospital_info = $request->session()->get('today_hospital');
		//monshinDB
		//yoyakuDB
		foreach($hospital_info as $list){
		$hospitalID_get_list = hospital::where('hospital_name', $list['hospital_name'])->first(['hospital_ID']);
		$hospitalID_get =$hospitalID_get_list['hospital_ID'];
		}
		$booking_detail->yoyaku_date = date('Y/m/d');
		$booking_detail->yoyaku_time = $request->session()->get('today_time');
		$booking_detail->patient_ID  = $patient_ID['patient_ID'];
		$booking_detail->hospital_Id = $hospitalID_get;
		$booking_detail->uketuke_flag = 0;
		$booking_detail->save();

		$last_insert_id_list = Yoyaku::where('patient_ID',$patient_ID['patient_ID'])->first(['yoyaku_ID']);


		//patientDB  予約者情報入力時に入力したものにupdateされるので新規登録者でない場合は入力に注意
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_sei' => $request->session()->get('T_sei')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_mei' => $request->session()->get('T_mei')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_address' => $request->session()->get('T_address')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_tell' => $request->session()->get('T_tel')]); 
		$booking3->where('patient_ID', $patient_ID['patient_ID'])->update(['patient_birth' => $request->session()->get('T_year')]); 
		

		
		//yoyaku_meisaisDB 
		$booking2->yoyaku_ID = $last_insert_id_list['yoyaku_ID'];

		$wakuchinID_get_list = Wakuchin::where('wakuchin_name',$request->session()->get('T_wakuchin'))->first(['wakuchin_ID']);
		
		$wakuchinID_get =$wakuchinID_get_list['wakuchin_ID'];
		$booking2->wakuchin_ID = $wakuchinID_get;
		$booking2->save();

		return view('today_yoyaku_Conp');
	}
}