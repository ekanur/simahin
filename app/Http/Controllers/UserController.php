<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;
use simahin\User;
use Validator;


class UserController extends Controller
{
    //

    public function index(){
        $user = User::with("negara")->get();
    	// $user = Mahasiswa::all();
        // dd($mahasiswa);
        return view("user", compact("user"));
    }

    public function tambah(){
    	return view("tambah_user");
    }

    public function add(Request $request){
        $user = new User;

        $user->nim = $request->nim;
        $user->nama_depan= $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->fakultas_id = $request->fakultas_id;
        $user->jurusan_id = $request->jurusan_id;
        $user->negara_id = $request->negara_id;
        $user->foto = "face-3.jpg";
        $saved = $user->save();

        if ($saved) {
            \Session::flash("flash_message", "Berhasil menambah mahasiswa");
            return \Redirect::to("user");
        }else{
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
            return \Redirect::to("user");
        }

    }

    public function detail($id){
    	return view("detail_mahasiswa");
    }
}
