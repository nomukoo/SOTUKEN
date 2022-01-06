<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class y_check2Controller extends Controller
{
	
	public function move(Request $request)
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
}