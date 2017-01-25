<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;
use simahin\Mahasiswa;
use Validator;


class MahasiswaController extends Controller
{
    //

    public function index(){
        $mahasiswa = Mahasiswa::with("negara")->get();
    	// $mahasiswa = Mahasiswa::all();
        // dd($mahasiswa);
        return view("mahasiswa", compact("mahasiswa"));
    }

    public function tambah(){
    	return view("tambah_mahasiswa");
    }

    public function add(Request $request){
        $mahasiswa = new Mahasiswa;

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_depan= $request->nama_depan;
        $mahasiswa->nama_belakang = $request->nama_belakang;
        $mahasiswa->fakultas_id = $request->fakultas_id;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->negara_id = $request->negara_id;
        $mahasiswa->foto = "face-3.jpg";
        $saved = $mahasiswa->save();

        if ($saved) {
            \Session::flash("flash_message", "Berhasil menambah mahasiswa");
            return \Redirect::to("mahasiswa");
        }else{
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
            return \Redirect::to("mahasiswa");
        }

    }

    public function detail($id){
    	return view("detail_mahasiswa");
    }
}
