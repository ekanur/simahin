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
Route::get("/user/detail/{id}", "UserController@detail");

Route::auth();

// Route::get('/home', 'HomeController@index');
