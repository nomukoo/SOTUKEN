<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\warehousingDeleteController;
use App\Http\Controllers\HelloWorldController;


Route::get('/', function () {
    return view('welcome');
});




Route::get('/map/currentLocation', 'HospitalController@currentLocation');// 追加
Route::post('/map/currentLocation', 'HospitalController@currentLocation');// 追加

Route::get('result', 'HospitalController@currentLocation')->name('result.currentLocation');// 追加



 