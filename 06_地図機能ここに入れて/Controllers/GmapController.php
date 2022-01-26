<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospital;
use Illuminate\Support\Facades\DB;

class GmapController extends Controller
{
    public function getHospital(Request $request){
        $data = $request->getContent();
        $list = json_decode($data, true);
        $ne = $list['ne'];
        $sw = $list['sw'];
        $hospital_tbl = DB::table('hospital');
        $hospital_list = $hospital_tbl
        ->join('remainder','hospital.hospital_ID','=','remainder.hospital_ID')
        ->where('hospital_ido','<=',$ne['lat'])
        ->where('hospital_keido','<',$ne['lng'])
        ->where('hospital_ido','>=',$sw['lat'])
        ->where('hospital_keido','>',$sw['lng'])
        ->get();
        return response()->json($hospital_list);
    }
}
