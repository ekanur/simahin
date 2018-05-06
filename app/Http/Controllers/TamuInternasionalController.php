<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;
use simahin\TamuInternasional;
use simahin\Dokumen;
use simahin\TipeKegiatan;
use simahin\Fakultas;
use simahin\KategoriDokumen;
use Validator;
use Intervention\Image\Facades\Image;


class TamuInternasionalController extends Controller
{
    public function index(){
        $tamu_internasional = TamuInternasional::with("negara", "tipe_kegiatan", "dokumen.kategori_dokumen", "jurusan.fakultas")->get();
    	// $tamu_internasional = Mahasiswa::all();
        // dd($tamu_internasional);
        $dokumen_status = array();
        foreach ($tamu_internasional as $data_user) {
            $total_expired = 0;
            foreach ($data_user->dokumen as $data_dokumen) {
                 if($data_dokumen->expired_on < date("Y-m-d")){
                    $total_expired++;
                 }
            }
            $dokumen_status[$data_user->id] = $total_expired;
        }

        // dd($dokumen_status);

        return view("user", compact("tamu_internasional", "dokumen_status"));
    }

    public function tambah(){
        $tipe_kegiatan = TipeKegiatan::all();
        $fakultas = Fakultas::where("id", "!=", "00")->get();

    	return view("tambah_user", compact("tipe_kegiatan", "fakultas"));
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
            $tamu_internasional = new TamuInternasional;
        }else{
            $tamu_internasional = TamuInternasional::findOrFail($request->id);
        }
        // $tamu_internasional->nim = $request->nim;
        $tamu_internasional->nama_depan= $request->nama_depan;
        $tamu_internasional->nama_belakang = $request->nama_belakang;
        $tamu_internasional->fakultas_id = $request->fakultas_id;
        $tamu_internasional->jurusan_id = $request->jurusan_id;
        $tamu_internasional->negara_id = $request->negara_id;
        $tamu_internasional->telp = $request->telp;
        $tamu_internasional->tipe = $request->tipe_user;
        $tamu_internasional->email = $request->email;
        $tamu_internasional->alamat_malang = $request->alamat_malang;
        $tamu_internasional->foto = $this->uploadFile($request);

        if ($tamu_internasional->save()) {

            \Session::flash("flash_message", "Profile berhasil dibuat, silakan upload berkas legalitas.");
            return redirect("/tamu_internasional/edit/".$tamu_internasional->id."#tab_berkas");
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

            $data[] = array("kategori_id"=>$kategori[$value], "scan_file"=>$this->uploadBerkas($value, $request->user_id, $request->file($value)), "expired_on"=>$request->input("expired_".$value), 'tamu_internasional_id'=>$request->user_id);
        }
        
        // dd($data);

        $dokumen = Dokumen::insert($data);

        if($dokumen){
            \Session::flash("flash_message", "Berkas berhasil diupload");
        }else{
            \Session::flash("flash_message", "Terjadi kesalahan. Silakan coba lagi");
        }
        return redirect("/tamu_internasional/edit/".$request->user_id."#tab_berkas");
    }

    public function uploadBerkas($tipe_berkas, $tamu_internasional_id, $file){
        $save_path = public_path("uploads/berkas/");
        $file_name = strrev(substr(md5($tamu_internasional_id), 0,15))."_".$tipe_berkas."_".time().".jpeg";
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
            return redirect("/tamu_internasional/edit/".$request->user_id."#tab_berkas");
        }
        
    }

    public function detail($id){
        $tamu_internasional = TamuInternasional::with("fakultas", "jurusan", "negara", "tipe_kegiatan", "dokumen.kategori_dokumen")->where('id', $id)->firstOrFail();
        // dd($tamu_internasional->dokumen);
        $dokumen = array();
        if (sizeof($tamu_internasional->dokumen)>0) {
            foreach ($tamu_internasional->dokumen as $tamu_internasional_dokumen) {
            $dokumen[strtolower($tamu_internasional_dokumen->kategori_dokumen->singkatan)] = array("scan_file"=>$tamu_internasional_dokumen->scan_file, "expired_on"=>$tamu_internasional_dokumen->expired_on);
            }

            // dd($dokumen);
        }
        $tipe_kegiatan = TipeKegiatan::all();
        $fakultas = Fakultas::where("id", "!=", "00")->get();
    	return view("tambah_user", compact('tamu_internasional', "tipe_kegiatan", "fakultas", "dokumen"));
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
        $tamu_internasional = TamuInternasional::find($id);
        $tamu_internasional->delete();
        $dokumen = Dokumen::find($id);
        $dokumen->delete();

        \Session::flash("flash_message", "Berhasil menghapus tamu internasional");
            return redirect()->back();
    }
}
