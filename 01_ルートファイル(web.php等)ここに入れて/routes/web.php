<?php
use Illuminate\Support\Facades\Route;

Route::get('barcoderead', 'WarehousingController@disp_read');

Route::post('warehousing_ajax', 'WarehousingAjaxController@getJson');

Route::get('warehousing_confirm', 'WarehousingController@disp_confirm');

Route::post('/warehousing_register', 'WarehousingController@register');

Route::get('warehousing_ajax', 'WarehousingAjaxController@sendJson');

Route::get('finish_print', 'WarehousingController@disp_finish_print');

Route::get('/get_vaccinedata','WarehousingAjaxController@getVaccineData');

Route::get('/', 'TopController@disp_top');

Route::get('ship_read', 'ShipController@disp_read');

Route::get('log', 'LogController@disp_log');

Route::get('defrost_list','DefrostController@disp_list');

Route::post('get_defrost_list','DefrostController@getDefrostList');

Route::get('test', function(){
    return view('test');
});

Route::post('/get_defrost_info','DefrostController@comet');

Route::get('/defrost_read','DefrostController@disp_read');

Route::get('/user_login', 'LoginController@user_login');
Route::post('/user_login', 'LoginController@user_login');

Route::get('/emp_login', 'LoginController@emp_login');
Route::post('/emp_login', 'LoginController@emp_login');

Route::get('/admin_login', 'LoginController@admin_login');
Route::post('/admin_login', 'LoginController@admin_login');

Route::get('/user_logout', 'LoginController@user_logout');
Route::post('/user_logout', 'LoginController@user_logout');

Route::get('/emp_logout', 'LogoutController@emp_logout');
Route::post('/emp_logout', 'LogoutController@emp_logout');

Route::get('/admin_logout', 'LoginController@admin_logout');
Route::post('/admin_logout', 'LoginController@admin_logout');

Route::get('/get_syringedata','WarehousingAjaxController@getSyringeData');
Route::get('/barcode_read_syringe','WarehousingController@disp_read_syringe');

Route::post('/warehousing_register_syringe','WarehousingController@register_syringe');

Route::get('/warehousing_confirm_syringe', 'WarehousingController@disp_confirm_syringe');

Route::get('/distinctionItem', 'DefrostController@distinctionItem');