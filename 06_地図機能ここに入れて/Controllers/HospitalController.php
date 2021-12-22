<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospital;

class HospitalController extends Controller
{
    public function currentLocation(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        // currentLocationで表示
        return view('/map/currentLocation', [
            // 現在地緯度latをbladeへ渡す
            'lat' => $lat,
            // 現在地経度lngをbladeへ渡す
            'lng' => $lng,
        ]);
    }
    public function hospitalget(Request $request)
{
    $hospital = new hospital;
    $hospitalID=$request->input('hospital');
    $item = hospital::where('hospital_ID',$hospitalID)->get();
    return view('defrost_list')->with('item',$item);
}


public function top()
  {
    return view('top');
}


}

