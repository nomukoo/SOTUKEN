<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('userlogin');
});
Route::post('/', function(){
    return view('userlogin');
});

Route::get('/user_login', 'LoginController@user_login');
Route::post('/user_login', 'LoginController@user_login');

Route::get('/emp_login', 'LoginController@emp_login');
Route::post('/emp_login', 'LoginController@emp_login');

Route::get('/admin_login', 'LoginController@admin_login');
Route::post('/admin_login', 'LoginController@admin_login');

Route::get('/user_logout', 'LoginController@user_logout');
Route::post('/user_logout', 'LoginController@user_logout');

Route::get('/emp_logout', 'LoginController@emp_logout');
Route::post('/emp_logout', 'LoginController@emp_logout');

Route::get('/admin_logout', 'LoginController@admin_logout');
Route::post('/admin_logout', 'LoginController@admin_logout');


//入庫

Route::get('warehousing_barcode_read', 'WarehousingController@disp_read');

Route::get('warehousing_confirm', 'WarehousingController@disp_confirm');

Route::post('warehousing_ajax', 'WarehousingAjaxController@getJson');

Route::post('warehousing_register', 'WarehousingController@register');

Route::get('warehousing_ajax', 'WarehousingAjaxController@sendJson');

Route::get('finish_print', 'WarehousingController@disp_finish_print');

//出庫

Route::get('shipping_barcode_read', 'ShippingController@disp_read');

Route::get('shipping_display',  'ShippingController@index');

Route::get('shipping_menu', 'ShippingController@shipping_menu');

Route::post('shipping_register', 'ShippingController@register');

Route::get('map', 'MapsController@map');
Route::post('map', 'MapsController@map');

Route::get('result', 'MapsController@currentLocation')->name('result.currentLocation');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//廃棄
Route::get('/PlannedDisposal', 'DisposalController@PlannedDisposal_get');
Route::post('/PlannedDisposal', 'DisposalController@PlannedDisposal_get');

Route::get('/Disposal/{id}/', 'DisposalController@Disposal');
Route::post('/Disposal/{id}/', 'DisposalController@Disposal');
