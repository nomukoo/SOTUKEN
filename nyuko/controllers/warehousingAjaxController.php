<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class warehousingAjaxController extends Controller
{
    public function getJson(Request $request){
        $json = file_get_contents("php://input"); //json文字列取り出し
        $list = json_decode($json, true); //デコード
        $request->session()->put('text',$list);
        return response()->json("ok");
        

    
    }
}
