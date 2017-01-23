<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

use simahin\Http\Requests;
use simahin\Prodi;
use Validator;
use Session;

class AkreditasiController extends Controller
{
    public function index(){
    	$list_prodi=\DB::table("main_reference")->where("ref", "prodi")->get();
    	// $where_fakultas=["ref"=>"fakultas", ""];
    	$list_fakultas=\DB::table("main_reference")->where("ref", "fakultas")->where("id", "!=", "00")->get();
    	return view("index", compact("list_prodi", "list_fakultas"));
    }

    public function store(Request $request){
    	$prodi=New Prodi;

    	$prodi->file=$this->upload($request->file_akreditasi);

    	$prodi->nama=$this->format_prodi($request->prodi);
    	$prodi->fakultas=$this->get_fakultas($request->fakultas);
    	$prodi->jenjang=$this->get_jenjang($request->prodi);
    	$prodi->no_sk=$request->no_sk;
    	$prodi->expired_date=$request->expired_on;
    	$prodi->nilai=$request->nilai;
    	$prodi->peringkat=$request->peringkat;
    	$prodi->status=$request->status;
    	$prodi->keterangan = ($request->keterangan==1) ? "Proses Akreditasi" : "" ;

    	$prodi->save();

    	Session::flash("success", "Berhasil Menambahkan Akreditasi");
    	return back();
    	
    }

    public function upload($file){
 		// var_dump($file);exit();
    	$rules=array(
    		"file_akreditasi"=>"image|max:3000|required"
    		);
    	$files=array(
    		"file_akreditasi"=>$file
    		);
    	$validation=Validator::make($files, $rules);

    	if($validation->fails()){
    		return redirect()->back()->withInput()->withErrors($validation);
    	}else{
    		if($file[0]->isValid()){
    			$destination="uploads";
    			$ext=$file->getClientOriginalExtension();
    			$filename="akreditasi_".substr(sha1(substr(md5($file->getClientOriginalName()),0,4).uniqid(rand(),true)), 0, 7).".".$ext;

    			if ($file->move($destination, $filename)) {
    				return $filename;
    			} else {
    				Session::flash("error", "File failed");
    				return redirect()->back();
    			}
    			
    		}
    	}

    }

    public function get_jenjang($prodi){
    	$pos=strpos($prodi, "-");

    	return substr($prodi, 0, ($pos-1));
    }

    public function format_prodi($prodi){
    	return str_replace(" - ", " ", $prodi);
    }

    public function get_fakultas($fakultas){
		   if (strpos($fakultas, "Ilmu Pendidikan")!==FALSE) {
		   		return "FIP";
		   } elseif(strpos($fakultas, "Sastra")!==FALSE) {
		   		return "FS";
		   }elseif(strpos($fakultas, "Matematika")!==FALSE){
		   		return "FMIPA";
		   }elseif(strpos($fakultas, "Ekonomi")!==FALSE){
		   		return "FE";
		   }elseif(strpos($fakultas, "Teknik")!==FALSE){
		   		return "FT";
		   }elseif(strpos($fakultas, "Keolahragaan")!==FALSE){
		   		return "FIK";
		   }elseif(strpos($fakultas, "Sosial")!==FALSE){
		   		return "FS";
		   }elseif(strpos($fakultas, "Psikologi")!==FALSE){
		   		return "FPPsi";
		   }elseif(strpos($fakultas, "Pascasarjana")!==FALSE){
		   		return "Pascasarjana";
		   }elseif(strpos($fakultas, "Vokasi")!==FALSE){
		   		return "Vokasi";
		   }
   	}
}
