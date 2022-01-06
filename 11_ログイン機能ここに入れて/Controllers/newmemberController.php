<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class newmemberController extends Controller
{
	
	public function move(Request $request)
	{
		

		$request->session()->put('userID',$request->input('userID'));
		$request->session()->put('password',$request->input('password'));
		$request->session()->put('email',$request->input('email'));

		$booking = new Patient();
		$booking->patient_ID = $request->session()->get('userID');
		$booking->patient_password = $request->session()->get('password');
		$booking->patient_email = $request->session()->get('email');

		$booking->save();

		return view('newmember');
	}
}