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

Route::get('test', function(){
    return view('table');
});

