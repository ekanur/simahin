<?php

namespace simahin\Http\Controllers;

use Illuminate\Http\Request;

use simahin\Http\Requests;

use simahin\TamuInternasional;
use simahin\Dokumen;
use simahin\TipeKegiatan;

class DashboardController extends Controller
{
    //
    public function index(){
    	$tamu_baru = $this->tamuInternasionalBaru();
    	$total_tamu = $this->totalTamuInternasional();
    	$berkas_expired = $this->berkasExpired();
    	$pembaruan_berkas = $this->pembaruanBerkas();
        $per_negara = $this->totalTamuInternasionalPerNegara();

    	// dd($pembaruan_berkas);
    	return view("index", compact('tamu_baru', 'total_tamu', 'berkas_expired', "pembaruan_berkas", "per_negara"));
    }


    public function tamuInternasionalBaru(){
    	//created on this year
    	$tamu_internasional_baru = TamuInternasional::whereYear("created_at", "=", date("Y"))->count();

    	return $tamu_internasional_baru;
    }

    public function totalTamuInternasional(){
    	//deleted on is null
    	$tamu_internasional = TamuInternasional::count();

    	return $tamu_internasional;
    }

    public function berkasExpired(){
    	//user.deleted is null and berkas.expired_on<date("Y-m-d")
    	$dokumen = TamuInternasional::withCount(["dokumen" => function ($query){
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

    public function totalTamuInternasionalBaru(){
    	$tipe_kegiatan = TipeKegiatan::all();
    	$tamu_internasional = TamuInternasional::select(\DB::raw("count(id)"), "tipe", \DB::raw("EXTRACT(YEAR FROM created_at) as tahun"))->whereYear("created_at", "<=", date("Y"))->whereYear("created_at", ">=", (date("Y")-5))->groupBy("tahun", "tipe")->orderBy("tahun", "asc")->get();
    	$data = array();
    	$data_tamu_internasional = array();

    	foreach ($tamu_internasional as $tamu_internasionals) {
    		$data_tamu_internasional[$tamu_internasionals->tipe][$tamu_internasionals->tahun] = $tamu_internasionals->count;
    	}

    	foreach ($tipe_kegiatan as $tipe) {
    		$x=0;
    		for ($i=intval(date("Y")-4); $i <= intval(date("Y")) ; $i++) { 
    			$data[$tipe->nama][$x++] = (isset($data_tamu_internasional[$tipe->id][$i]))? $data_tamu_internasional[$tipe->id][$i]:0 ;
       		}
    	}
    	

    	// dd($data);

    	return response()->json(array($data));
    }

    public function totalTamuInternasionalPerKegiatan(){
    	$user = TamuInternasional::with("tipe_kegiatan")->select(\DB::raw("count(id)"), "tipe")->groupBy("tipe")->orderBy("tipe", "asc")->get();

    	// dd($user);
    	$data = array();
    	foreach ($user as $data_user) {
    		$data[$data_user->tipe_kegiatan->nama] = $data_user->count;
    	}
    	return response()->json($data);
    }

    public function totalTamuInternasionalPerNegara(){
        $user = TamuInternasional::with('negara')->select(\DB::raw("count(id) as total"), "negara_id")->groupBy('negara_id')->get();

        $data = array();

        foreach ($user as $data_user) {
            $data[] = array(
                "singkatan" => $data_user->negara->nama,
                "total" => $data_user->total
            );
        }

        return $data;
    }

}
