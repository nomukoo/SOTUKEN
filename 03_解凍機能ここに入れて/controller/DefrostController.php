<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefrostController extends Controller
{
    public function disp_list(){
        return view('defrost_list');
    }

    public function comet(Request $request){
        $json = file_get_contents('php://input'); //json文字列取り出し
        $list = json_decode($json, true); //デコード
        $hospital_ID = $list['hospital_ID'];
        $sts = $list['sts'];
        
        while(true){
            $yoteis = DB::table('yoteis');
            $result = $yoteis
            ->where('hospital_ID',$hospital_ID)
            ->whereDate('yotei_date',date('Y/m/d'))
            ->exists();
            if($result == true && $sts == 'exist'){
                sleep(4);
            } else if($result == false && $sts == 'none'){
                sleep(4); 
            } else if($result == true && $sts == 'none'){
                return response()->json('exist');
                break;
            } else if($result == false && $sts == 'exist'){
                return response()->json('none');
                break;
            }
        }
            
        
    }

    public function getDefrostList(Request $request){
        $json = file_get_contents('php://input'); //json文字列取り出し
        $data = json_decode($json, true); //デコード
        $yoteis = DB::table('yoteis');
        $result = $yoteis
        ->selectRaw('yotei_meisais.wakuchin_name,lot_number,yotei_amount,group_id')
        ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
        ->where('yoteis.hospital_ID','=',$data['hospital_ID'])
        ->whereDate('yotei_date',date('Y/m/d'))
        ->get();
        if($result->isEmpty()){
            return response()->json('empty');
        } else {
            return response()->json(json_encode($result));
        }
       
    }
}
