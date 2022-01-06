<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;


class yoyaku_timeController extends Controller
{
	
	public function move(Request $request)
	{
		$request->session()->put('hospital',$request->input('hospital'));   //地図のsession
		
		return view('yoyaku_time');
	}
}