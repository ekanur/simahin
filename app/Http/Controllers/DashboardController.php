<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

use simahin\Http\Requests;

class DashboardController extends Controller
{
    //
    public function index(){
    	return view("index");
    }
}
