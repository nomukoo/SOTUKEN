<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospital;
use App\Models\hospital_kari;
class HospitalregisterController extends Controller
{
    public function hospitalinput()
  {
    return view('hospitalinput');
}


public function hospitalinputerror()
  {
    return view('hospitalinputerror');
}


public function hospitalregiverifi(Request $request)
  {


    
      $hoapitals = hospital_kari::all();
      $hoapital_list = hospital_kari::all();
      if(count($hoapital_list) !=0){
    return view('hospitalregiverifi' ,[
      "hospitals" => $hoapitals
  ]);
}else{
  $msg = ['msg' => '新規のデータは存在しません'];
      return view('errorhospital', $msg);
}
 
}

public function hospitalregifinish(Request $request)
  {   
    $hoapital_list = hospital_kari::all();
    if(count($hoapital_list) !=0){
      foreach($hoapital_list as $list){
        $hospital = new hospital();
        $hospital_kari = new hospital_kari();
        $hospital->hospital_ID = $list['hospital_ID'];
        $hospital->hospital_name = $list['hospital_name'];
        $hospital->hospital_address = $list['hospital_address'];
        $hospital->hospital_tell = $list['hospital_tell'];
        $hospital->hospital_idokeido = $list['hospital_ido'];
        $hospital->hospital_keido = $list['hospital_keido'];
        $hospital->timestamps=false;
        $hospital->save();
        $hospital_kari->where('hospital_ID', $list['hospital_ID'])->delete();
      }
      return view('hospitalregifinish');
    }else{
      $msg = ['msg' => '新規のデータは存在しません'];
      return view('errorhospital', $msg);
    }
       
   


   $request->session()->forget('hospital_ID');
   $request->session()->forget('hospital_name');
   $request->session()->forget('hospital_address');
   $request->session()->forget('hospital_tell');
   $request->session()->forget('hospital_ido');
   $request->session()->forget('hospital_keido');


    
}

public function hospitaldeleverifi(Request $request)
  {
    
    $hospital_kari = new hospital_kari();

    
    $hoapitals = hospital_kari::all();
    return view('hospitaldeleverifi' ,[
      "hospitals" => $hoapitals
  ]);
}

public function hospitaldelefinish(Request $request)
  {
    $hospital_kari = new hospital_kari();
    $hospital_kari->where('hospital_ID', $request->session()->get('hospital_ID'))->delete();
 
 
    $request->session()->forget('hospital_ID');
    $request->session()->forget('hospital_name');
    $request->session()->forget('hospital_address');
    $request->session()->forget('hospital_tell');
    $request->session()->forget('hospital_ido');
    $request->session()->forget('hospital_keido');
 
 
 
    return view('hospitaldelefinish');
}

public function hospitaledit(Request $request)
  {
    
    $hospital = new hospital();

    
    $hoapitals = hospital::all();
    return view('hospitaledit' ,[
      "hospitals" => $hoapitals
  ]);
  }
  
public function hospitaleditverifi(Request $request)
  {
    $hospital = new hospital();
    $request->session()->put('hospital_ID', $request->input('hospital_ID'));
  $request->session()->put('hospital_name', $request->input('hospital_name'));
  $request->session()->put('hospital_address', $request->input('hospital_address'));
  $request->session()->put('hospital_tell', $request->input('hospital_tell'));
  $request->session()->put('hospital_ido', $request->input('hospital_ido'));
  $request->session()->put('hospital_keido', $request->input('hospital_keido'));

  $hospital->timestamps=false;
    return view('hospitaleditverifi');
}

public function hospitaleditfinish()
  {
    return view('hospitaleditfinish');
}


public function hospitalregierror()
  {
    return view('hospitalregierror');
}

public function top()
  {
    return view('top');
}



public function create() {
  return view('hospitalinput');
}


public function hospitalinputverifi(Request $request) {

  $hospital_kari = new hospital_kari();

  $request->session()->put('hospital_ID', $request->input('hospital_ID'));
  $request->session()->put('hospital_name', $request->input('hospital_name'));
  $request->session()->put('hospital_address', $request->input('hospital_address'));
  $request->session()->put('hospital_tell', $request->input('hospital_tell'));
  $request->session()->put('hospital_ido', $request->input('hospital_ido'));
  $request->session()->put('hospital_keido', $request->input('hospital_keido'));

  $hospital_kari->timestamps=false;
  return view('hospitalinputverifi');
}

public function hospitalinputfinish(Request $request) {


  $hospital = hospital::all()->where('hospital_ID', $request->session()->get('hospital_ID'))->first();
  $msg = ['msg' => '入力されたIDは既に存在します'];


  if ($hospital !=null && [$request->session()->get('hospital_ID') === $hospital->hospital_ID]) {
    


    $request->session()->forget('hospital_ID');
 $request->session()->forget('hospital_name');
 $request->session()->forget('hospital_address');
 $request->session()->forget('hospital_tell');
 $request->session()->forget('hospital_ido');
 $request->session()->forget('hospital_keido');


    return view('error_userhospital',$msg);



  }else{

   $hospital_kari = new hospital_kari();
   $hospital_kari->hospital_ID = $request->session()->get('hospital_ID');
   $hospital_kari->hospital_name = $request->session()->get('hospital_name');
   $hospital_kari->hospital_address = $request->session()->get('hospital_address');
   $hospital_kari->hospital_tell = $request->session()->get('hospital_tell');
   $hospital_kari->hospital_idokeido = $request->session()->get('hospital_ido');
   $hospital_kari->hospital_idokeido = $request->session()->get('hospital_keido');

  $hospital_kari->timestamps=false;
  $hospital_kari->save();
  return view('hospitalinputfinish');
  }
}

public function hospitallist(Request $request)
  {
    $hospital_kari = new hospital_kari();
    
    $hoapitals = hospital_kari::all();
    return view('hospitallist' ,[
      "hospitals" => $hoapitals
  ]);
}

public function hospitalhome(Request $request)
  {
    $hospital = new hospital();
    
    $hoapitals = hospital::all();
    return view('hospitalhome' ,[
      "hospitals" => $hoapitals
  ]);
}


public function admini_top()
  {
    return view('admini_top');
}



}
