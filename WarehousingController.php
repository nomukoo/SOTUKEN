<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehousingController extends Controller
{
    public function register(Request $request){
        $message = $request->message;
        
        return view('aaaaa', $message);
    }
}
