<?php
use Illuminate\Support\Facades\Route;
/* topページ */
Route::get('/', function () {
    return view('top');
});

Route::get('barcoderead', 'WarehousingController@disp_read');

Route::post('warehousing_ajax', 'WarehousingAjaxController@getJson');

Route::get('warehousing_confirm', 'WarehousingController@disp_confirm');

Route::post('warehousing_register', 'WarehousingController@register');

Route::get('warehousing_ajax', 'WarehousingAjaxController@sendJson');

Route::get('finish_print', 'WarehousingController@disp_finish_print');