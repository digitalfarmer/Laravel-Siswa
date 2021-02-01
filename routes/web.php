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

Route::get('/', function () {
    return view('home');
});

Route::get('/login','AuthController@login')->name('login');
Route::get('/logout','AuthController@logout');
Route::post('/postlogin','AuthController@postlogin');



Route::group(['middleware'=> 'auth'], function(){
    Route::get('/dashboard','DashboardController@index');

    Route::get('/siswa','SiswaController@index');
    Route::post('/siswa','SiswaController@create');
    Route::get('/siswa/{id}','SiswaController@edit');
    //save edit
    Route::post('/siswa/{id}','SiswaController@update');
    Route::get('/siswa/{id}/delete','SiswaController@destroy');
});
