<?php

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

use Illuminate\Routing\RouteGroup;

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/','SiteController@home');

Route::get('/login','AuthController@login')->name('login');
Route::get('/logout','AuthController@logout');
Route::post('/postlogin','AuthController@postlogin');

//admin
Route::group(['middleware'=> ['auth','checkRole:admin']], function(){
Route::get('/siswa','SiswaController@index');
    //Route::get('/dashboard','DashboardController@index');

    Route::post('/siswa','SiswaController@create');
    Route::get('/siswa/{siswa}','SiswaController@edit');
    //save edit
    Route::post('/siswa/{id}','SiswaController@update');
    Route::get('/siswa/{id}/delete','SiswaController@destroy');
    Route::get('/siswa/{siswa}/profile','SiswaController@profile');
    Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
    Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');
    Route::get('/guru/{guru_id}/profile-guru','GuruController@profile');
    Route::get('/siswaexport','SiswaController@export');
    Route::get('/exportpdf','SiswaController@exportpdf');
});

//siswa
Route::group(['middleware'=> ['auth','checkRole:admin,siswa']], function() {
    Route::get('/dashboard','DashboardController@index'); //akses control
});

Route::post('/testpost','TestController@testpost');
