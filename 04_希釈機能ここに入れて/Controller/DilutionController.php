<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defrost;
use App\Models\Yoyaku;
use App\Models\use_ables;
use Carbon\Carbon;
use App\Models\Dilution;

class DilutionController extends Controller
{
    public function dilution_list()
  {
    
    return view('dilution_list');
}
public function dilution_read(Request $request)
  {
    $session_get = $request->session()->get('emp_Info');
    $defrost_lists = Defrost::where('hospital_ID',$session_get['hospital_ID'])->orderBy('expair','ASC')->get();
    $today=Carbon::now()->toDateString();
    $yoyaku_count=Yoyaku::where('hospital_ID',$session_get['hospital_ID'])->whereDate('yoyaku_date', $today)->count();

  
    return view('dilution_read' ,compact('defrost_lists','yoyaku_count'));
}

public function dilution_finish(Request $request)
  {
    $vial_quantity = $request->input('vial_quantity');
    $session_get = $request->session()->get('emp_Info');

    $defrost_list = Defrost::where('hospital_ID',$session_get['hospital_ID'])->orderBy('expair','ASC')->get();
    foreach($defrost_list as $defrost_lists){
      if($vial_quantity<$defrost_lists['defrost_total']&& $vial_quantity>0){
        $dilution =new Dilution();
        $defrost =new Defrost();
        $dilution->wakuchin_ID  = $defrost_lists['wakuchin_ID'];
        $dilution->lot_number = $defrost_lists['lot_number'];
        $dilution->hospital_ID = $defrost_lists['hospital_ID'];
        $dilution->dilution_date = $defrost_lists['defrost_date'];
        $dilution->expair = $defrost_lists['expair'];
        $dilution->dilution_total = $vial_quantity;
        $dilution->timestamps=false;
        $dilution->save();
        Defrost::where('defrost_ID',$defrost_lists['defrost_ID'])->update([
          'defrost_total' => $defrost_lists['defrost_total']-$vial_quantity,
        ]);
        //$defrost->defrost_total = $defrost_lists['defrost_total']-$vial_quantity;
        $vial_quantity = $vial_quantity - $defrost_lists['defrost_total'];
      }else if($vial_quantity>0){
        $dilution =new Dilution();
        $defrost =new Defrost();
        $dilution->wakuchin_ID  = $defrost_lists['wakuchin_ID'];
        $dilution->lot_number = $defrost_lists['lot_number'];
        $dilution->hospital_ID = $defrost_lists['hospital_ID'];
        $dilution->dilution_date = $defrost_lists['defrost_date'];
        $dilution->expair = $defrost_lists['expair'];
        $dilution->dilution_total = $defrost_lists['defrost_total'];
        $dilution->timestamps=false;
        $dilution->save();
        $vial_quantity = $vial_quantity - $defrost_lists['defrost_total'];
        $defrost->where('defrost_ID', $defrost_lists['defrost_ID'])->delete();
      }else{
        return view('dilution_error');
      }
    }
    $dilution_list = Dilution::where('hospital_ID',$session_get['hospital_ID'])->get();
    if(count($dilution_list)==0){
      return view('dilution_error');
    }else{
      return view('dilution_finish',compact('dilution_list'));
    }
    
}



public function dilution_error()
  {
    return view('dilution_error');
}

}
