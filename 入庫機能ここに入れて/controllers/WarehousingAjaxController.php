<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wakuchin;

class WarehousingAjaxController extends Controller
{
    public function getJson(Request $request){
        $json = file_get_contents('php://input'); //json文字列取り出し
        $list = json_decode($json, true); //デコード
        $request->session()->put('list',$list);//セッションに格納
        return response()->json('200 ok');
    }

    public function sendJson(Request $request){
        $tmp = session('list');
        $jsonData = json_encode($tmp);
        return response()->json($jsonData);
    }

    public function getVaccineData(Request $request){
        $code = $request->all();
        $array = Wakuchin::where('wakuchin_ID',$code)->get();
        $asarray = $array[0];
        $name = $asarray['wakuchin_name'];
        return response()->json($asarray);
    }
}
