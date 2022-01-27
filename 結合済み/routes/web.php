<?php
use Illuminate\Support\Facades\Route;
/* トップ系　*/
Route::get('/', 'TopController@disp_top');

Route::post('/get_defrost_info','DefrostController@comet');

/*ログイン系*/
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


/*入庫系*/
Route::get('barcoderead', 'WarehousingController@disp_read'); 

Route::post('warehousing_ajax', 'WarehousingAjaxController@getJson');

Route::get('warehousing_confirm', 'WarehousingController@disp_confirm');

Route::post('/warehousing_register', 'WarehousingController@register');

Route::get('warehousing_ajax', 'WarehousingAjaxController@sendJson');

Route::get('finish_print', 'WarehousingController@disp_finish_print');

Route::get('/get_vaccinedata','WarehousingAjaxController@getVaccineData');

Route::get('/get_syringedata','WarehousingAjaxController@getSyringeData');

Route::get('/barcode_read_syringe','WarehousingController@disp_read_syringe');

Route::post('/warehousing_register_syringe','WarehousingController@register_syringe');

Route::get('/warehousing_confirm_syringe', 'WarehousingController@disp_confirm_syringe');

/* 出庫系 */
Route::get('defrost_list','DefrostController@disp_list');

Route::post('get_defrost_list','DefrostController@getDefrostList');

Route::get('/defrost_read','DefrostController@disp_read');

Route::get('/user_login', 'LoginController@user_login');

Route::post('/distinctionItem', 'DefrostController@distinctionItem');

Route::post('/defrost_register', 'DefrostController@defrostRegister');

Route::get('/defrost_finish','DefrostController@disp_finish');

Route::get('defrost_print','DefrostController@disp_print');

/* 希釈系 */
Route::get('dilution_read', 'DilutionController@dilution_read');
Route::post('dilution_read', 'DilutionController@dilution_read');


Route::get('dilution_finish', 'DilutionController@dilution_finish');
Route::post('dilution_finish', 'DilutionController@dilution_finish');

Route::get('dilution_error', 'DilutionController@dilution_error');
Route::post('dilution_error', 'DilutionController@dilution_error');


