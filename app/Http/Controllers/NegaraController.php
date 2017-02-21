<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

use simahin\Http\Requests;
use simahin\Negara;

class NegaraController extends Controller
{
    //

    public function find($q){
    	$negara = Negara::where("nama", "ILIKE", "%".strtoupper($q)."%")->get();
    	return response()->json($negara);
    }
}
