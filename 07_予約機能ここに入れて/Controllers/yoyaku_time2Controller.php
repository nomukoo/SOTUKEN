<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class yoyaku_time2Controller extends Controller
{
	
	public function move(Request $request)
	{
		$request->session()->put('hospital_name',$request->input('hospital_name'));
		return view('yoyaku_time2');

	}
}