<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class top2Controller extends Controller
{
	
	public function move(Request $request)
	{
		$request->session()->put('userID',$request->input('userID'));

		return view('top2');
		
	}
	public function home(Request $request)
	{
		return view('top2');
		
	}

	
}