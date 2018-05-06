<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;
use simahin\Fakultas;
use simahin\Jurusan;

class FakultasController extends Controller
{
    //

    public function getJurusan($id){
    	$jurusan = Fakultas::find($id)->jurusan;
    	return response()->json($jurusan);
    }
}
