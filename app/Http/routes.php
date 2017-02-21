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
Route::post("/user/tambah", "UserController@add");

Route::get("user", "UserController@index");
Route::get("/user/tambah/", "UserController@tambah");
Route::post("/user/tambah/", "UserController@add");
Route::get("/user/edit/{id}", "UserController@detail");
Route::post("/user/simpan_berkas/", "UserController@simpanBerkas");
Route::post("/user/update_berkas/", "UserController@updateBerkas");

Route::get("/notifikasi", "NotifikasiController@index");

Route::group(["prefix" => "api"], function(){
	Route::get("negara/{q}", "NegaraController@find");
	Route::get("fakultas/{id}/jurusan", "FakultasController@getJurusan");
});

Route::auth();

// Route::get('/home', 'HomeController@index');
