<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

use simahin\Http\Requests;

use simahin\User;
use simahin\Dokumen;
use simahin\TipeUser;

class DashboardController extends Controller
{
    //
    public function index(){
    	$tamu_baru = $this->tamuInternasionalBaru();
    	$total_tamu = $this->totalTamuInternasional();
    	$berkas_expired = $this->berkasExpired();
    	$pembaruan_berkas = $this->pembaruanBerkas();

    	// dd($pembaruan_berkas);
    	return view("index", compact('tamu_baru', 'total_tamu', 'berkas_expired', "pembaruan_berkas"));
    }


    public function tamuInternasionalBaru(){
    	//created on this year
    	$user_baru = User::whereYear("created_at", "=", date("Y"))->count();

    	return $user_baru;
    }

    public function totalTamuInternasional(){
    	//deleted on is null
    	$user = User::count();

    	return $user;
    }

    public function berkasExpired(){
    	//user.deleted is null and berkas.expired_on<date("Y-m-d")
    	$dokumen = User::withCount(["dokumen" => function ($query){
    		$query->where("expired_on", "<", date("Y-m-d"));
    	}])->get();

    	$total=0;

    	foreach ($dokumen as $data_dokumen) {
    		$total = $total+$data_dokumen["dokumen_count"];
    	}

    	return $total;
    }

    public function pembaruanBerkas(){
    	//yearof(berkas.updated_at) == this year

    	$dokumen = Dokumen::whereYear("updated_at", "=", date("Y"))->count();

    	return $dokumen;
    }

    public function totalUserBaru(){
    	$tipe_user = TipeUser::all();
    	$user = User::select(\DB::raw("count(id)"), "tipe", \DB::raw("EXTRACT(YEAR FROM created_at) as tahun"))->whereYear("created_at", "<=", date("Y"))->whereYear("created_at", ">=", (date("Y")-5))->groupBy("tahun", "tipe")->orderBy("tahun", "asc")->get();
    	$data = array();
    	$data_user = array();

    	foreach ($user as $users) {
    		$data_user[$users->tipe][$users->tahun] = $users->count;
    	}

    	foreach ($tipe_user as $tipe) {
    		$x=0;
    		for ($i=intval(date("Y")-4); $i <= intval(date("Y")) ; $i++) { 
    			$data[$tipe->nama][$x++] = (isset($data_user[$tipe->id][$i]))? $data_user[$tipe->id][$i]:0 ;
       		}
    	}
    	

    	// dd($data);

    	return response()->json(array($data));
    }

    public function totalUserPerKegiatan(){
    	$user = User::with("tipe_user")->select(\DB::raw("count(id)"), "tipe")->groupBy("tipe")->orderBy("tipe", "asc")->get();

    	// dd($user);
    	$data = array();
    	foreach ($user as $data_user) {
    		$data[$data_user->tipe_user->nama] = $data_user->count;
    	}
    	return response()->json($data);
    }

    public function totalUserPerNegara(){

    }

}
