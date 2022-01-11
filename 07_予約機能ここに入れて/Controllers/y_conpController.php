<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\y_monshin;
use App\Models\Yoyaku;
use App\Models\Yoyaku_meisai;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Wakuchin;

class y_conpController extends Controller
{
    public function move(Request $request)
	{
	
		$booking = new y_monshin();
		$booking_detail = new Yoyaku();
		$booking2 = new Yoyaku_meisai();
		$booking3 = new Patient();

		//monshinDB
		$booking->Q0001 = $request->session()->get('ticketnumber');
		$booking->Q0002 = $request->session()->get('sei');
		$booking->Q0003 = $request->session()->get('mei');
		$booking->Q0004 = $request->session()->get('seikana');
		$booking->Q0005 = $request->session()->get('meikana');
		$booking->Q0006 = $request->session()->get('year');
		$booking->Q0007 = $request->session()->get('address_num');
		$booking->Q0008 = $request->session()->get('address');
		$booking->Q0009 = $request->session()->get('tel');
		$booking->save();

		//yoyakuDB
		$hospitalID_get_list = Hospital::where('hospital_name', $request->session()->get('hospital'))->first(['hospital_ID']);

		$booking_detail->yoyaku_date = $request->session()->get('day');
		$booking_detail->yoyaku_time = $request->session()->get('time');
		$booking_detail->patient_ID  = $request->session()->get('userID');
		$booking_detail->hospital_Id = $hospitalID_get_list['hospital_ID'];
		$booking_detail->uketuke_flag = 0;
		$booking_detail->save();
		
		$last_insert_id_list = Yoyaku::where('patient_ID',$request->session()->get('userID'))->first(['yoyaku_ID']);//同じpatient_IDの人が二回目の予約をすると一回目の方のyoyaku_IDが取れてしまう
		

		//patientDB  予約者情報入力時に入力したものにupdateされるので新規登録者でない場合は入力に注意
		$booking3->where('patient_ID', $request->session()->get('userID'))->update(['patient_sei' => $request->session()->get('sei')]); 
		$booking3->where('patient_ID', $request->session()->get('userID'))->update(['patient_mei' => $request->session()->get('mei')]); 
		$booking3->where('patient_ID', $request->session()->get('userID'))->update(['patient_address' => $request->session()->get('address')]); 
		$booking3->where('patient_ID', $request->session()->get('userID'))->update(['patient_tell' => $request->session()->get('tel')]); 
		$booking3->where('patient_ID', $request->session()->get('userID'))->update(['patient_birth' => $request->session()->get('year')]); 


		
		//yoyaku_meisaisDB
		$booking2->yoyaku_ID = $last_insert_id_list['yoyaku_ID'];

		$monshinID_get_list = y_monshin::where('Q0001', $request->session()->get('ticketnumber'))->first(['monshin_ID']);
		$monshinID_get =$monshinID_get_list['monshin_ID'];
		$booking2->monshin_ID = $monshinID_get;

		$wakuchinID_get_list = Wakuchin::where('wakuchin_name',$request->session()->get('wakuchin'))->first(['wakuchin_ID']);
		$wakuchinID_get =$wakuchinID_get_list['wakuchin_ID'];
		$booking2->wakuchin_ID = $wakuchinID_get;
		$booking2->save();

		
		return view('y_conp',compact('last_insert_id_list'));
	}
}
