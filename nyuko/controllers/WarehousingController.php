<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nyuko;
use App\Models\N_meisai;
use App\Models\Wakuchin_stock;
use Illuminate\Support\Facades\DB;

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

    public function disp_finish(){
        return view("warehousing_finish");
    }
   
    public function register(Request $request){
       
        $list = $request->session()->get("list");
        $header = $list["nyuko_header"];
        unset($list['nyuko_header']);
        DB::transaction(function() use($header, $list){
            $nyuko = new Nyuko;
            $nyuko->staff_ID = $header["staff_ID"];
            $nyuko->hospital_ID = $header["hospital_ID"];
            $nyuko->save();
            $last_insert_id = $nyuko->id;
            foreach($list as $rec){
                $n_meisai = new N_meisai;
                $n_meisai->nyuko_ID = $last_insert_id;
                $n_meisai->wakuchin_ID = $rec["code"];
                $n_meisai->nyuko_amount = $rec["amount"];
                $n_meisai->lot_number = $rec["lot"];
                $n_meisai->save();
                $wakuchin_stock = new Wakuchin_stock;
                $result = $wakuchin_stock
                ->where("wakuchin_ID",$rec["code"])
                ->where("hospital_ID",$header["hospital_ID"])
                ->where("lot_number",$rec["lot"])
                ->exists();
                if($result){
                    $result_array = $wakuchin_stock
                    ->where("wakuchin_ID",$rec["code"])
                    ->where("hospital_ID",$header["hospital_ID"])
                    ->where("lot_number",$rec["lot"])->get();
                    $one_rec = $result_array[0];
                    $wakuchin_total = $one_rec["wakuchin_total"];
                    $wakuchin_total += $rec["amount"];
                    $wakuchin_stock
                    ->where("wakuchin_ID",$rec["code"])
                    ->where("hospital_ID",$header["hospital_ID"])
                    ->where("lot_number",$rec["lot"])
                    ->update(["wakuchin_total" => $wakuchin_total]);

                } else {
                    $wakuchin_stock->wakuchin_ID = $rec["code"];
                    $wakuchin_stock->hospital_ID = $header["hospital_ID"];
                    $wakuchin_stock->lot_number = $rec["lot"];
                    $wakuchin_stock->wakuchin_total = $rec["amount"];
                    $wakuchin_stock->save();
                }
            }
        });
        
        return view("wait_print");   
    }
}