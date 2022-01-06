<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class y_hospitalController extends Controller
{
	
	public function move(Request $request)
	{
		$hospital = Hospital::get();
		$request->session()->put('date_val',$request->input('date_val'));
        return view('y_hospital', [
            "hospitals" => $hospital
        ]);	
	}
}