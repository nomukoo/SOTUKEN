<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefrostController extends Controller
{
    /*出庫予定画面表示メソッド*/
    public function disp_list(){
        return view('defrost_list');
    }
    
    /*出庫登録画面表示メソッド*/
    public function disp_read(){
        return view('defrost_read');
    }
    
    /* ログイン中ユーザの所属病院に当日の出庫予定の有無によって通知を送信するメソッド */
    public function comet(Request $request){
        $json = file_get_contents('php://input'); 
        $list = json_decode($json, true); 
        $hospital_ID = $list['hospital_ID']; //対象の病院ID取得
        $sts = $list['sts']; //画面の状態取得 exist or none
        $cnt = 10;
        while($cnt > 1){
            $yoteis = DB::table('yoteis');
            $result = $yoteis
            ->where('hospital_ID',$hospital_ID)
            ->whereDate('yotei_date',date('Y/m/d'))
            ->exists();
            /* 画面の通知の表示の状態と出庫予定リストの有無で処理を切り替える */
            if($result == true && $sts == 'exist'){
                sleep(5); //出庫予定があるが画面で既に通知が表示されているため何もしない 
            } else if($result == false && $sts == 'none'){
                sleep(5); //出庫酔いがなくかつ画面も通知が表示されていないため何もしない
            } else if($result == true && $sts == 'none'){
                return response()->json('exist'); //出庫予定があるが画面で通知されていないため、状態切り替えのメッセージを送信
                break;
            } else if($result == false && $sts == 'exist'){
                return response()->json('none'); //出庫予定がないが画面が通知状態になっているため、状態切り替えのメッセージを送信
                break;
            }
            $cnt -= 1;
        }
        exit(504);  
        
    }

    /* 出庫予定リスト取得メソッド */
    public function getDefrostList(Request $request){
        $json = file_get_contents('php://input'); 
        $data = json_decode($json, true); 
        $yoteis = DB::table('yoteis');
        $result = $yoteis
        ->selectRaw('yotei_meisais.wakuchin_ID,yotei_meisais.wakuchin_name,lot_number,yotei_amount,group_id')
        ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
        ->where('yoteis.hospital_ID','=',$data['hospital_ID'])
        ->whereDate('yotei_date',date('Y/m/d'))
        ->get();
        if($result->isEmpty()){
            return response()->json('empty'); //出庫予定ない時
        } else {
            return response()->json(json_encode($result)); //ある時
        }
    }

    /* 読み込まれたバーコードが注射器かワクチンか判定するメソッド */
    function distinctionItem(Request $request){
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);
        $code = $data['code'];
        $vaccine = DB::table('wakuchin');
        $v_rs = $vaccine
        ->where('wakuchin_ID',$code)
        ->exists();
        $syringe = DB::table('syringe');
        $s_rs = $syringe
        ->where('syringe_ID',$code)
        ->exists();
        if($v_rs){
            $rs = $vaccine
            ->selectRaw('wakuchin_ID,wakuchin_name')
            ->where('wakuchin_ID',$code)
            ->get();
            return response()->json($rs[0]);
        } else if($s_rs) {
            $rs = $syringe
            ->selectRaw('syringe_ID,syringe_name')
            ->where('syringe_ID',$code)
            ->get();
            return response()->json($rs[0]);
        } else {
            return response()->json('undefined');
        }
    }
       
}
