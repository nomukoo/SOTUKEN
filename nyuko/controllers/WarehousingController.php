<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nyuko;

class WarehousingController extends Controller
{   
    public function disp_read(){
        return view("warehousing_barcode_read");
    }

    public function disp_confirm(){
        return view("warehousing_confirm");
    }

    public function disp_finish_print(){
        return view("finish_print");
    }
   
    public function register(Request $request){
        
        $list = $request->session()->get("list");
        foreach ($list as $rec) {
        $nyuko = new Nyuko;
        $nyuko->wakuchin_ID = $rec["ワクチンID"];
        $nyuko->syringe_ID = $rec["注射器ID"];
        $nyuko->nyuko_date = date('Y/m/d');
        $nyuko->made = $rec["製造元"];
        $nyuko->kigen = $rec["有効期限"];
        $nyuko->amouont = $rec["数量/本"];
        $nyuko->timestamps = false;
        $nyuko->save();;
        }
        return view("wait_print");
    }
}