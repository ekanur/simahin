<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get("/", "DashboardController@index");
Route::get("/index", "DashboardController@index");
Route::post("simpan", "AkreditasiController@store");

Route::get("mahasiswa", "MahasiswaController@index");
Route::get("/mahasiswa/tambah/", "MahasiswaController@tambah");
Route::get("/mahasiswa/detail/", "MahasiswaController@detail");

Route::auth();

Route::get('/home', 'HomeController@index');
