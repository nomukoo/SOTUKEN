<?php

namespace App\Http\Controllers;

use App\Models\Disposal;
use App\Models\PlannedDisposal;
use Illuminate\Http\Request;

class DisposalController extends Controller
{
    public function PlannedDisposal_get(Request $request){
        $DB_PlannedDisposal_get = PlannedDisposal::orderBy('expair','asc')->get();
        return view('planned_disposal',compact('DB_PlannedDisposal_get'));
    }

    public function Disposal($id){
        $DB_PlannedDisposal_get = PlannedDisposal::where('PlannedDisposal_ID',$id)->get();
        if($DB_PlannedDisposal_get !=null){
            foreach($DB_PlannedDisposal_get as $list){
                $DB_Disposal_reg = new Disposal();
                $DB_Disposal_reg->PlannedDisposal_ID  = $list['PlannedDisposal_ID'];
                $DB_Disposal_reg->wakuchin_ID = $list['wakuchin_ID'];
                $DB_Disposal_reg->lot_number = $list['lot_number'];
                $DB_Disposal_reg->hospital_ID = $list['hospital_ID'];
                $DB_Disposal_reg->expair = $list['expair'];
                $DB_Disposal_reg->total = $list['total'];
                $DB_Disposal_reg->save();
            }
            PlannedDisposal::where('PlannedDisposal_ID',$id)->delete();
        }
        return back();
    }
}
