<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\warehousingDeleteController;
use App\Http\Controllers\HelloWorldController;


Route::get('/', function () {
    return view('top');
});


Route::get('/test/vaccineOut','vaccineTableController@vaccineOut');
Route::post('/test/vaccineOut','vaccineTableController@vaccineOut');
Route::post('/vaccineTable','vaccineTableController@vaccineTable');
Route::get('/vaccineTable','vaccineTableController@vaccineTable');



Route::get('warehousingDelete', [warehousingDeleteController::class, 'warehousingDelete']);

Route::get('move', 'HelloWorldController@move');
Route::post('next', 'NextController@index');

Route::get('index', 'vaccineTableController@index');
Route::post('delete', 'vaccineTableController@delete');

Route::get('/test/insatu', 'vaccineTableController@insatu');
Route::post('/test/insatu', 'vaccineTableController@insatu');

Route::get('/test/finishPrint', 'vaccineTableController@finishPrint');
Route::post('/test/finishPrint', 'vaccineTableController@finishPrint');


Route::get('/test/errorPrint', 'vaccineTableController@errorPrint');
Route::post('/test/errorhPrint', 'vaccineTableController@errorPrint');

Route::get('/map/map', 'vaccineTableController@map');
Route::post('/map/map', 'vaccineTableController@map');

Route::get('/map/currentLocation', 'HospitalController@currentLocation');
Route::post('/map/currentLocation', 'HospitalController@currentLocation');


// 追加
Route::get('result', 'HospitalController@currentLocation')->name('result.currentLocation');

Route::get('/test/sample', 'vaccineTableController@sample');
Route::post('/test/sample', 'vaccineTableController@sample');

Route::get('/test/sample1', 'vaccineTableController@sample1');
Route::post('/test/sample1', 'vaccineTableController@sample1');

Route::get('Log', 'LogController@Log');
Route::post('Log', 'LogController@Log');

Route::get('rensyu2', 'vaccineTableController@rensyu2');
Route::post('rensyu2', 'vaccineTableController@rensyu2');

Route::get('hospitalinput', 'HospitalregisterController@hospitalinput');
Route::post('hospitalinput', 'HospitalregisterController@hospitalinput');

Route::get('hospitalinputverifi', 'HospitalregisterController@hospitalinputverifi');
Route::post('hospitalinputverifi', 'HospitalregisterController@hospitalinputverifi');

Route::get('hospitalinputfinish', 'HospitalregisterController@hospitalinputfinish');
Route::post('hospitalinputfinish', 'HospitalregisterController@hospitalinputfinish');

Route::get('hospitalinputerror', 'HospitalregisterController@hospitalinputerror');
Route::post('hospitalinputerror', 'HospitalregisterController@hospitalinputerror');

Route::get('hospitallist', 'HospitalregisterController@hospitallist');
Route::post('hospitallist', 'HospitalregisterController@hospitallist');

Route::get('hospitalregiverifi', 'HospitalregisterController@hospitalregiverifi');
Route::post('hospitalregiverifi', 'HospitalregisterController@hospitalregiverifi');

Route::get('hospitalregifinish', 'HospitalregisterController@hospitalregifinish');
Route::post('hospitalregifinish', 'HospitalregisterController@hospitalregifinish');

Route::get('hospitaldeleverifi', 'HospitalregisterController@hospitaldeleverifi');
Route::post('hospitaldeleverifi', 'HospitalregisterController@hospitaldeleverifi');

Route::get('hospitaldelefinish', 'HospitalregisterController@hospitaldelefinish');
Route::post('hospitaldelefinish', 'HospitalregisterController@hospitaldelefinish');

Route::get('hospitaledit', 'HospitalregisterController@hospitaledit');
Route::post('hospitaledit', 'HospitalregisterController@hospitaledit');

Route::get('hospitaleditverifi', 'HospitalregisterController@hospitaleditverifi');
Route::post('hospitaleditverifi', 'HospitalregisterController@hospitaleditverifi');

Route::get('hospitaleditfinish', 'HospitalregisterController@hospitaleditfinish');
Route::post('hospitaleditfinish', 'HospitalregisterController@hospitaleditfinish');

Route::get('hospitalregierror', 'HospitalregisterController@hospitalregierror');
Route::post('hospitalregierror', 'HospitalregisterController@hospitalregierror');

Route::get('reception_read', 'ReceptController@reception_read');
Route::post('reception_read', 'ReceptController@reception_read');

Route::get('reception_finish', 'ReceptController@reception_finish');
Route::post('reception_finish', 'ReceptController@reception_finish');

Route::get('reception_error', 'ReceptController@reception_error');
Route::post('reception_error', 'ReceptController@reception_error');

Route::get('reception_confirm', 'ReceptController@reception_confirm');
Route::post('reception_confirm', 'ReceptController@reception_confirm');

Route::get('test/blade', 'ReceptController@blade');
Route::post('test/blade', 'ReceptController@blade');

Route::get('test/blade1', 'ReceptController@blade1');
Route::post('test/blade1', 'ReceptController@blade1');

Route::get('test/blade2', 'ReceptController@blade2');
Route::post('test/blade2', 'ReceptController@blade2');

Route::get('test/blade3', 'ReceptController@blade3');
Route::post('test/blade3', 'ReceptController@blade3');

Route::get('test/blade4', 'ReceptController@blade4');
Route::post('test/blade4', 'ReceptController@blade4');

Route::get('test/blade5', 'ReceptController@blade5');
Route::post('test/blade5', 'ReceptController@blade5');

Route::get('test/blade6', 'ReceptController@blade6');
Route::post('test/blade6', 'ReceptController@blade6');

Route::get('user_input', 'User_informationController@user_input');
Route::post('user_input', 'User_informationController@user_input');

Route::get('user_confirm', 'User_informationController@user_confirm');
Route::post('user_confirm', 'User_informationController@user_confirm');

Route::get('user_finish', 'User_informationController@user_finish');
Route::post('user_finish', 'User_informationController@user_finish');

Route::get('user_error', 'User_informationController@user_error');
Route::post('user_error', 'User_informationController@user_error');


Route::get('defrost_list', 'hospitalController@hospitalget');
Route::post('defrost_list', 'hospitalController@hospitalget');

Route::get('defrost_read', 'DefrostController@defrost_read');
Route::post('defrost_read', 'DefrostController@defrost_read');

Route::get('defrost_confirm', 'DefrostController@defrost_confirm');
Route::post('defrost_confirm', 'DefrostController@defrost_confirm');

Route::get('defrost_finish', 'DefrostController@defrost_finish');
Route::post('defrost_finish', 'DefrostController@defrost_finish');

Route::get('dilution_list', 'DilutionController@dilution_list');
Route::post('dilution_list', 'DilutionController@dilution_list');

Route::get('dilution_read', 'DilutionController@dilution_read');
Route::post('dilution_read', 'DilutionController@dilution_read');


Route::get('dilution_finish', 'DilutionController@dilution_finish');
Route::post('dilution_finish', 'DilutionController@dilution_finish');

Route::get('dilution_error', 'DilutionController@dilution_error');
Route::post('dilution_error', 'DilutionController@dilution_error');

Route::get('defrost_error', 'DefrostController@defrost_error');
Route::post('defrost_error', 'DefrostController@defrost_error');

Route::get('shipping_list', 'Shipping_listController@shipping_list');
Route::post('shipping_list', 'Shipping_listController@shipping_list');

Route::get('disposal_list', 'DisposalController@disposal_list');
Route::post('disposal_list', 'DisposalController@disposal_list');

Route::get('disposal_read', 'DisposalController@disposal_read');
Route::post('disposal_read', 'DisposalController@disposal_read');





Route::get('disposal_confirm', 'DisposalController@disposal_confirm');
Route::post('disposal_confirm', 'DisposalController@disposal_confirm');

Route::get('disposal_finish', 'DisposalController@disposal_finish');
Route::post('disposal_finish', 'DisposalController@disposal_finish');

Route::get('disposal_error', 'DisposalController@disposal_error');
Route::post('disposal_error', 'DisposalController@disposal_error');


Route::get('map/samplemap', 'vaccineTableController@samplemap');
Route::post('map/samplemap', 'vaccineTableController@samplemap');

Route::get('yoyaku/yoyaku', 'YoteiController@yoyaku');
Route::post('yoyaku/yoyaku', 'YoteiController@yoyaku');

Route::get('samplehos', 'HospitalController@hospital');
Route::post('samplehos', 'HospitalController@hospital');

Route::get('/test/add', 'HospitalController@add');
Route::post('/test/result', 'HospitalController@result');


Route::post('insert/finish', [
    'uses' => 'YoteiController@finish',
    'as' => 'insert.finish'
  ]);

  Route::get('/information', 'PostsController@create');
  Route::get('/add', 'PostsController@add');
Route::post('/add', 'PostsController@add');

Route::get('/hospitalinput', 'HospitalregisterController@create');
Route::get('/hospitalinputverifi', 'HospitalregisterController@hospitalinputverifi');
Route::post('/hospitalinputverifi', 'HospitalregisterController@hospitalinputverifi');

Route::get('/top', 'HospitalController@top');
Route::post('/top', 'HospitalController@top');

Route::get('/hospitalhome', 'HospitalregisterController@hospitalhome');
Route::post('/hospitalhome', 'HospitalregisterController@hospitalhome');



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

Route::get('/errorhospital', 'HospitalregisterController@errorhospital');
Route::post('/errorhospital', 'HospitalregisterController@errorhospital');

Route::get('/error_userhospital', 'HospitalregisterController@error_userhospital');
Route::post('/error_userhospital', 'HospitalregisterController@error_userhospital');