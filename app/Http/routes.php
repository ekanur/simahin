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

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get("/", "DashboardController@index");
Route::get("/index", "DashboardController@index");
Route::post("/tamu_internasional/tambah", "TamuInternasionalController@add");

Route::get("tamu_internasional", "TamuInternasionalController@index");
Route::get("/tamu_internasional/tambah/", "TamuInternasionalController@tambah");
Route::post("/tamu_internasional/tambah/", "TamuInternasionalController@add");
Route::get("/tamu_internasional/edit/{id}", "TamuInternasionalController@detail");
Route::get("/tamu_internasional/hapus/{id}", "TamuInternasionalController@hapus");
Route::post("/tamu_internasional/simpan_berkas/", "TamuInternasionalController@simpanBerkas");
Route::post("/tamu_internasional/update_berkas/", "TamuInternasionalController@updateBerkas");

Route::get("/notifikasi", "NotifikasiController@index");

Route::group(["prefix" => "api"], function(){
	Route::get("negara/{q}", "NegaraController@find");
	Route::get("fakultas/{id}/jurusan", "FakultasController@getJurusan");
	Route::get("tamu_internasional/baru", "DashboardController@totalTamuInternasionalBaru");
	Route::get("tamu_internasional/kegiatan", "DashboardController@totalTamuInternasionalPerKegiatan");
	Route::get("tamu_internasional/negara", "DashboardController@totalTamuInternasionalPerNegara");
});

// Route::auth();

// Route::get('/home', 'HomeController@index');
