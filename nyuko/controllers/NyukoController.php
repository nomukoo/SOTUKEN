<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nyuko;

class NyukoController extends Controller
{
    public function register(Request $request){
        $nyuko = new Nyuko;
        $list = $request->session()->get('list');
        $nyuko->wakuchin_ID = $list['ワクチンID'];
        $nyuko->syringe_ID = $list['注射器ID'];
        $nyuko->nyuko_date = date('Y/m/d');
        $nyuko->made = $list['製造元'];
        $nyuko->kigen = $list['有効期限'];
        $nyuko->amouont = $list['数量/本'];
        $nyuko->timestamps = false;
        $nyuko->save();
    }
}
