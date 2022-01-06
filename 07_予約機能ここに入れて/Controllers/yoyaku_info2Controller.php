<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wakuchin;

class yoyaku_info2Controller extends Controller
{
	
	public function move(Request $request)
	{
		$wakuchin = Wakuchin::get();
		$request->session()->put('time',$request->input('time'));
		return view('yoyaku_info2', [
            "vaccine" => $wakuchin
        ]);
	}
}