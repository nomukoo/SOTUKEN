<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inputForm', 'postTestController@inputForm');// 入力フォーム画面(inputForm)のURL割当、起動コントローラ・関数指定
Route::post('formPost', 'postTestController@formPost');

Route::get('vaccineOut', 'vaccineTableController@vaccineOut');
Route::post('vaccineOut', 'vaccineTableController@vaccineOut');

Route::get('table', 'vaccineTableController@vaccineTable');
Route::post('table', 'vaccineTableController@vaccineTable');

Route::get('vaccinestockDelete', 'vaccineTableController@vaccinestockDelete');
Route::post('vaccinestockDelete', 'vaccineTableController@vaccinestockDelete');

Route::get('deleteConfilm', 'vaccineTableController@deleteConfilm');
Route::post('deleteConfilm', 'vaccineTableController@deleteConfilm');

Route::get('vaccinePrinter', 'vaccineTableController@vaccinePrinter');
Route::post('vaccinePrinter', 'vaccineTableController@vaccinePrinter');

Route::get('finishPrint', 'vaccineTableController@finishPrint');
Route::post('finishPrint', 'vaccineTableController@finishPrint');

Route::get('finishStock', 'vaccineTableController@finishStock');
Route::post('finishStock', 'vaccineTableController@finishStock');

Route::get('errorStock', 'vaccineTableController@errorStock');
Route::post('errorStock', 'vaccineTableController@errorStock');

Route::get('errorPrint', 'vaccineTableController@errorPrint');
Route::post('errorPrint', 'vaccineTableController@errorPrint');

Route::get('vaccineEdit', 'vaccineTableController@vaccineEdit');
Route::post('vaccineEdit', 'vaccineTableController@vaccineEdit');

Route::get('editConfilm', 'vaccineTableController@editConfilm');
Route::post('editConfilm', 'vaccineTableController@editConfilm');

Route::get('vaccinefinishEdit', 'vaccineTableController@vaccinefinishEdit');
Route::post('vaccinefinishEdit', 'vaccineTableController@vaccinefinishEdit');

Route::get('dialog', 'vaccineTableController@dialog');
Route::post('dialog', 'vaccineTableController@dialog');

Route::get('menuTop', 'vaccineTableController@menuTop');
Route::post('menuTop', 'vaccineTableController@menuTop');

Route::get('register', 'NyukoController@register');
Route::post('register', 'NyukoController@register');

Route::get('warehousingConfirm', 'vaccineTableController@warehousingConfirm');
Route::post('warehousingConfirm', 'vaccineTableController@warehousingConfirm');

Route::post('/warehousingAjax', 'warehousingAjaxController@getJson');
Route::get('/warehousingAjax', 'warehousingAjaxController@getJson');

