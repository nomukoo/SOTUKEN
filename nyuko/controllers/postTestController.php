<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class postTestController extends Controller
{
    public function inputForm()
    {
        $data = ['msg'=>"テキストボックスに入力してください。"];
        return view('inputForm', $data);
    }

    public function formPost(Request $request)
    {
        $data = [
            'fruits_name'=>$request->fruits_name,
            'fruits_count'=>$request->fruits_count,
            'fruits_value'=>$request->fruits_value,
            'total_value'=>$request->fruits_count * $request->fruits_value,
            'msg'=>"入力値を元に表示しています。"
        ];
        return view('resultPage', $data);
    }
}

