<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //

    public function index(){
    	return view("mahasiswa");
    }

    public function tambah(){
    	return view("tambah_mahasiswa");
    }

    public function detail(){
    	return view("detail_mahasiswa");
    }
}
