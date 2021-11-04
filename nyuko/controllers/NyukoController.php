<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nyuko;

class NyukoController extends Controller
{
    public function register(Request $request){
        $nyuko = new Nyuko;
        $form = $request->all();
        unset($form['_token']);
        $nyuko->nyuko_ID = $request->nyuko_ID;
        $nyuko->timestamps = false;
        $nyuko->save();
    }
}
