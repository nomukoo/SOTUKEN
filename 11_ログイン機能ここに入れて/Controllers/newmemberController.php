<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class newmemberController extends Controller
{
	
	public function move(Request $request)
	{
		
		$booking = new Patient();
		$booking->patient_ID = $request->input('userID');
		$booking->patient_password = $request->input('password');
		$booking->save();

		return view('newmember');
	}
}