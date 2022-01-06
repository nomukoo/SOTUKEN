<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userloginController extends Controller
{
	
	public function move()
	{
		return view('userlogin');
	}
}