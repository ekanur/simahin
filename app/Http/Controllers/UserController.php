<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;
use simahin\User;
use simahin\Dokumen;
use simahin\TipeUser;
use simahin\Fakultas;
use simahin\KategoriDokumen;
use Validator;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function index(){
        $user = User::with("negara", "tipe_user", "dokumen.kategori_dokumen", "jurusan.fakultas")->get();
    	// $user = Mahasiswa::all();
        // dd($user);
        $dokumen_status = array();
        foreach ($user as $data_user) {
            $total_expired = 0;
            foreach ($data_user->dokumen as $data_dokumen) {
                 if($data_dokumen->expired_on < date("Y-m-d")){
                    $total_expired++;
                 }
            }
            $dokumen_status[$data_user->id] = $total_expired;
        }

        // dd($dokumen_status);

        return view("user", compact("user", "dokumen_status"));
    }

    public function tambah(){
        $tipe_user = TipeUser::all();
        $fakultas = Fakultas::where("id", "!=", "00")->get();

    	return view("tambah_user", compact("tipe_user", "fakultas"));
    }

    public function add(Request $request){

        $validator = $this->validator($request);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator->messages())
                    ->withInput();
        }

        if (null == $request->id) {
            $user = new User;
        }else{
            $user = User::findOrFail($request->id);
        }
        // $user->nim = $request->nim;
        $user->nama_depan= $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->fakultas_id = $request->fakultas_id;
        $user->jurusan_id = $request->jurusan_id;
        $user->negara_id = $request->negara_id;
        $user->telp = $request->telp;
        $user->tipe = $request->tipe_user;
        $user->email = $request->email;
        $user->alamat_malang = $request->alamat_malang;
        $user->foto = $this->uploadFile($request);

        if ($user->save()) {

            \Session::flash("flash_message", "Profile berhasil dibuat, silakan upload berkas legalitas.");
            return redirect("/user/edit/".$user->id."#tab_berkas");
        }else{
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
            return redirect()->back();
        }

    }

    public function simpanBerkas(Request $request){
        $validator = $this->validator($request);

        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator->messages())
                    ->withInput();
        }

        $data = array();
        $kategori_dokumen = KategoriDokumen::all();
        $kategori = array();
        for ($i=0; $i < sizeof($kategori_dokumen); $i++) {
            $kategori[strtolower($kategori_dokumen[$i]->singkatan)] = $kategori_dokumen[$i]->id;         
        }

        $request_file = ["visa", "stm", "sktt"];
        if ($request->hasFile("imta")) {
            array_push($request_file, "imta");
        }elseif($request->hasFile("ijin_belajar")){
            array_push($request_file, "ijin_belajar");
        }
        
        foreach ($request_file as $value) {

            $data[] = array("kategori_id"=>$kategori[$value], "scan_file"=>$this->uploadBerkas($value, $request->user_id, $request->file($value)), "expired_on"=>$request->input("expired_".$value), 'user_id'=>$request->user_id);
        }
        
        // dd($data);

        $dokumen = Dokumen::insert($data);

        if($dokumen){
            \Session::flash("flash_message", "Berkas berhasil diupload");
        }else{
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
        }
        return redirect("/user/edit/".$request->user_id."#tab_berkas");
    }

    public function uploadBerkas($tipe_berkas, $user_id, $file){
        $save_path = public_path("uploads/berkas/");
        $file_name = strrev(substr(md5($user_id), 0,15))."_".$tipe_berkas."_".time().".jpeg";
        $avatar = Image::make($file);
        $avatar->save($save_path . $file_name);
        return $file_name;
    }

    public function updateBerkas(Request $request){
        $validator = $this->validator($request);

        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator->messages())
                    ->withInput();
        }
        // kurang update file_scan dan tanggal expired
        $updated = array();
        if($request->hasFile("visa")){
            $updated["visa"] = Dokumen::where("user_id", $request->user_id)
                    ->where("kategori_id", 3)
                    ->update(['scan_file'=>$this->uploadBerkas("visa", $request->user_id, $request->file("visa")), "expired_on"=> $request->expired_visa]);
        }
        if($request->hasFile("stm")){
            $updated["stm"] = Dokumen::where("user_id", $request->user_id)
                    ->where("kategori_id", 1)
                    ->update(['scan_file'=>$this->uploadBerkas("stm", $request->user_id, $request->file("stm")), "expired_on"=> $request->expired_stm]);
        }
        if($request->hasFile("sktt")){
            $updated["sktt"] = Dokumen::where("user_id", $request->user_id)
                    ->where("kategori_id", 2)
                    ->update(['scan_file'=>$this->uploadBerkas("sktt", $request->user_id, $request->file("sktt")), "expired_on"=> $request->expired_sktt]);
        }
        if($request->hasFile("ijin_belajar")){
            $updated["ijin_belajar"] = Dokumen::where("user_id", $request->user_id)
                    ->where("kategori_id", 4)
                    ->update(['scan_file'=>$this->uploadBerkas("ijin_belajar", $request->user_id, $request->file("ijin_belajar")), "expired_on"=> $request->expired_ijin_belajar]);
        }
        if($request->hasFile("imta")){
            $updated["imta"] = Dokumen::where("user_id", $request->user_id)
                    ->where("kategori_id", 5)
                    ->update(['scan_file'=>$this->uploadBerkas("imta", $request->user_id, $request->file("imta")), "expired_on"=> $request->expired_imta]);
        }

        // dd($updated);

        if(in_array("0", $updated)){
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
            return redirect()->back()->withInput();
        }else{
            \Session::flash("flash_message", "Berhasil memperbarui dokumen");
            return redirect("/user/edit/".$request->user_id."#tab_berkas");
        }
        
    }

    public function detail($id){
        $user = User::with("fakultas", "jurusan", "negara", "tipe_user", "dokumen.kategori_dokumen")->where('id', $id)->firstOrFail();
        // dd($user->dokumen);
        $dokumen = array();
        if (sizeof($user->dokumen)>0) {
            foreach ($user->dokumen as $user_dokumen) {
            $dokumen[strtolower($user_dokumen->kategori_dokumen->singkatan)] = array("scan_file"=>$user_dokumen->scan_file, "expired_on"=>$user_dokumen->expired_on);
            }

            // dd($dokumen);
        }
        $tipe_user = TipeUser::all();
        $fakultas = Fakultas::where("id", "!=", "00")->get();
    	return view("tambah_user", compact('user', "tipe_user", "fakultas", "dokumen"));
    }

    public function validator(Request $request){
        $biodata = [
            "foto" => 'image',
            "nama_depan" => "required | string",
            "nama_belakang" => "required | string",
            "negara" => "required",
            "negara_id" => "required",
            "jurusan_id" => "required",
            "telp" => "numeric",
            "email" => "required|email",
            "alamat_malang" => "required"
        ];

        $berkas = [
            "visa" => 'required | image | max:2000',
            "stm" => 'required | image | max :2000',
            "sktt" => 'required | image | max :2000',
            "expired_visa" => "required | date | after:today",
            'expired_stm' => "required | date | after:today",
            'expired_sktt' => "required | date | after:today",
        ];

        $rule = array();

        if($request->step == 'upload_berkas'){
            // validation on upload berkas 
            if($request->tipe_user == 2){
                // if user is Guru Internasional, use IMTA
                $berkas = array_collapse([$berkas, ["imta" => 'required | image | max :2000'], ['expired_imta' => "required | date | after:today"]]);
            }elseif($request->tipe_user == 1){
                //if user is mahasiswa international, use ijin belajar
                $berkas = array_collapse([$berkas, ["ijin_belajar" => 'required | image | max :2000'], ['expired_ijin_belajar' => "required | date | after:today"]]);
            }

            $rule = $berkas;
        }elseif($request->step == 'update_berkas'){
            if($request->hasFile("visa")){
                $rule = array_collapse([$rule, ["visa"=>"image | max:2000", "expired_visa"=>"required | date | after:today"]]);
            }
            if($request->hasFile("stm")){
                $rule = array_collapse([$rule, ["stm"=>"image | max:2000", "expired_stm"=>"required | date | after:today"]]);
            }
            if($request->hasFile("sktt")){
                $rule = array_collapse([$rule, ["sktt"=>"image | max:2000", "expired_sktt"=>"required | date | after:today"]]);
            }
            if($request->hasFile("ijin_belajar")){
                $rule = array_collapse([$rule, ["ijin_belajar"=>"image | max:2000", "expired_ijin_belajar"=>"required | date | after:today"]]);
            }
            if($request->hasFile("imta")){
                $rule = array_collapse([$rule, ["imta"=>"image | max:2000", "expired_imta"=>"required | date | after:today"]]);
            }
            // dd($rule);
        }elseif($request->step == 'biodata'){
            // validtion on upload biodata
            $rule = $biodata;
        }

        $validator = Validator::make($request->all(), $rule);

        return $validator;
    }

    public function uploadFile(Request $request){
        if(is_null($request->file('foto')) && is_null($request->foto_lama)){
            return "default.jpeg";
        }elseif(is_null($request->file('foto')) && !is_null($request->foto_lama)){
            return $request->foto_lama;
        }

        if(!is_null($request->file('foto')) && $request->foto_lama != 'default.jpeg' && !is_null($request->foto_lama)){
            \File::delete(public_path() . "/uploads/user/".$request->foto_lama);
        }

        $save_path = public_path("uploads/user/");
        $file_name = strtolower(substr(str_replace(" ","_",$request->nama_depan.$request->nama_belakang), 0,15))."_".time().".jpeg";
        $avatar = Image::make($request->file("foto"));
        $avatar->save($save_path . $file_name);
        return $file_name;
    }


    public function hapus($id){
        $user = User::find($id);
        $user->delete();
        $dokumen = Dokumen::find($id);
        $dokumen->delete();

        \Session::flash("flash_message", "Berhasil menghapus tamu internasional");
            return redirect()->back();
    }
}
