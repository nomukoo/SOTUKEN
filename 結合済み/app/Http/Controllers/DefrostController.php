<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Defrost;
class DefrostController extends Controller
{
    /*出庫予定画面表示メソッド*/
    public function disp_list(){
        $emp_info = session()->get('emp_Info');
        if($emp_info != null){
            return view('defrost_list');
        } else {
            return view('employee_login');
        }
    }
    
    /*出庫登録画面表示メソッド*/
    public function disp_read(){
        $emp_info = session()->get('emp_Info');
        if($emp_info != null){
            return view('defrost_read');
        } else {
            return view('employee_login');
        }
    }

    public function disp_finish(){
        $emp_info = session()->get('emp_Info');
        if($emp_info != null){
            return view('defrost_finish');
        } else {
            return view('employee_login');
        }
    }

    public function disp_print(){
        $emp_info = session()->get('emp_Info');
        if($emp_info != null){
            return view('defrost_print');
        } else {
            return view('employee_login');
        }
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
        $data = $request->all();
        $code = $data['code'];
        $wakuchin_tbl = DB::table('wakuchin');
        $flag1 = $wakuchin_tbl
        ->selectRaw('wakuchin_ID,wakuchin_name')
        ->where('wakuchin_ID',$code)
        ->exists();
        $syringe_tbl = DB::table('syringe');
        $flag2 = $syringe_tbl
        ->selectRaw('syringe_ID,syringe_name')
        ->where('syringe_ID',$code)
        ->exists();
        if($flag1 == true){
            $name = $wakuchin_tbl
            ->where('wakuchin_ID',$code)
            ->get();
            return response()->json($name);
        } else if($flag2 == true){
            $name = $syringe_tbl
            ->where('syringe_ID',$code)
            ->get();
            return response()->json($name);
        } else {
            return response()->json('undefined');
        }
        return response()->json($asarray);
    }

    function defrostRegister(Request $request){
        $data = request()->input('data');
        $emp_info = session()->get('emp_Info'); //ユーザ情報
        $defrost_wakuchin_list = array(); //印刷処理に回すためのセッション登録用にワクチン出庫情報を蓄積していく
        foreach($data as $rec){
            $code = $rec['code']; //商品コード取得
            $lot = $rec['lot']; //ロット番号取得
            $amount = $rec['amount']; //数量取得
            $wakuchin = DB::table('wakuchin');
            /* 対象がワクチンかどうか判定 */
            $result = $wakuchin
            ->where('wakuchin_ID',$code)
            ->exists();
            if($result){
                /*対象がワクチンの時の出庫登録処理 */
                $defrost_wakuchin_list[] = $rec; 
                /* 対象のワクチン在庫数取得 */
                $wakuchin_stocks = DB::table('wakuchin_stocks');
                $wakuchin_total = $wakuchin_stocks
                ->selectRaw('wakuchin_total')
                ->where('wakuchin_ID',$code)
                ->where('lot_number',$lot)
                ->where('hospital_ID',$emp_info['hospital_ID'])
                ->get(); 
                if($wakuchin_total >= $amount){
                    /* 在庫から出庫数量を引く */
                    $wakuchin_stocks
                    ->where('wakuchin_ID',$code)
                    ->where('lot_number',$lot)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->decrement('wakuchin_total',$amount);
                    $yoteis = DB::table('yoteis');
                    /* 出庫数量を出庫予定表から引く */
                    $yoteis
                    ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->where('wakuchin_ID',$code)
                    ->where('lot_number',$lot)
                    ->decrement('yotei_amount',$amount);
                    $getamount = DB::table('yoteis');
                    /* 予定数量が０になっていないかの判定のため予定数量取得 */
                    $yotei_amount = $getamount
                    ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                    ->where('wakuchin_ID',$code)
                    ->where('lot_number',$lot)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->value('yotei_amount');
                    if($yotei_amount <= 0){
                        /* 予定数量が0になっていれば実行、予定リストから当該行を削除 */
                        $yotei_meisais = DB::table('yotei_meisais');
                        $yotei_meisais
                        ->join('yoteis','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                        ->where('wakuchin_ID',$code)
                        ->where('lot_number',$lot)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->delete();
                    }
                    $get_reserveinv = DB::table('wakuchin_stocks');
                    $reserve_inv = $get_reserveinv
                    ->where('wakuchin_ID',$code)
                    ->where('lot_number',$lot)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->value('reserve_inventory');
                    if($reserve_inv >= $amount){
                        $update_reserveinv = DB::table('wakuchin_stocks');
                        $update_reserveinv
                        ->where('wakuchin_ID',$code)
                        ->where('lot_number',$lot)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->decrement('reserve_inventory',$amount);
                    } else {
                        $update_reserveinv = DB::table('wakuchin_stocks');
                        $update_reserveinv
                        ->where('wakuchin_ID',$code)
                        ->where('lot_number',$lot)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->decrement('reserve_inventory',0);
                    }
                    $existsCheckDefrost = DB::table('kaitou');
                    $rs = $existsCheckDefrost
                    ->where('wakuchin_ID',$code)
                    ->where('lot_number',$lot)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->where('defrost_date',date('Y/m/d'))
                    ->exists();
                    if($rs){
                        $update_defrost = DB::table('kaitou');
                        $update_defrost
                        ->where('wakuchin_ID',$code)
                        ->where('lot_number',$lot)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->where('defrost_date',date('Y/m/d'))
                        ->increment('defrost_total',$amount);
                    } else {
                        $expair;
                        $target_date = date("Y/m/d");
                        $last_date = date('Ymd', strtotime($target_date." last day of +1 month"));
                        $prev_date = date('Ymd', strtotime($target_date." +1 month"));
                        if ($prev_date > $last_date) {
                            $expair = $last_date;
                        } else {
                            $expair =  $prev_date;
                        }
                        $insertDefrost = new Defrost;
                        $insertDefrost->wakuchin_ID = $code;
                        $insertDefrost->lot_number = $lot;
                        $insertDefrost->hospital_ID = $emp_info['hospital_ID'];
                        $insertDefrost->defrost_total = $amount;
                        $insertDefrost->defrost_date = date("Y/m/d");
                        $insertDefrost->expair = $expair;
                        $insertDefrost->save();
                    }
                    
                }
                
            } else {
                $syringe_stocks = DB::table('syringe_stocks');
                $syringe_total = $syringe_stocks
                ->selectRaw('syringe_total')
                ->where('syringe_ID',$code)
                ->where('hospital_ID',$emp_info['hospital_ID'])
                ->get(); 
                if($syringe_total >= $amount) {
                    $syringe_stocks
                    ->where('syringe_ID',$code)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->decrement('syringe_total',$amount);
                    /* 出庫数量を出庫予定表から引く */
                    $yoteis = DB::table('yoteis');
                    $yoteis
                    ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->where('wakuchin_ID',$code)
                    ->decrement('yotei_amount',$amount);
                    $getamount = DB::table('yoteis');
                    /* 予定数量が０になっていないかの判定のため予定数量取得 */
                    $yotei_amount = $getamount
                    ->join('yotei_meisais','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                    ->where('wakuchin_ID',$code)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->value('yotei_amount');
                    if($yotei_amount <= 0){
                        /* 予定数量が0になっていれば実行、予定リストから当該行を削除 */
                        $yotei_meisais = DB::table('yotei_meisais');
                        $yotei_meisais
                        ->join('yoteis','yoteis.yotei_ID','=','yotei_meisais.yotei_ID')
                        ->where('wakuchin_ID',$code)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->delete();
                    }
                    $get_reserveinv = DB::table('syringe_stocks');
                    $reserve_inv = $get_reserveinv
                    ->where('syringe_ID',$code)
                    ->where('hospital_ID',$emp_info['hospital_ID'])
                    ->value('reserve_inventory');
                    if($reserve_inv >= $amount){
                        $update_reserveinv = DB::table('syringe_stocks');
                        $update_reserveinv
                        ->where('syringe_ID',$code)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->decrement('reserve_inventory',$amount);
                    } else {
                        $update_reserveinv = DB::table('syringe_stocks');
                        $update_reserveinv
                        ->where('syringe_ID',$code)
                        ->where('hospital_ID',$emp_info['hospital_ID'])
                        ->decrement('reserve_inventory',0);
                    }
                }
            }
            
        }
        session()->put('defrost_wakuchin_list',$defrost_wakuchin_list);
        if(count($defrost_wakuchin_list) == 0){
            return redirect('/defrost_finish');
        } else {
            return redirect('/defrost_print');
        }
    }
       
}
