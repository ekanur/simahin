<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table ="mahasiswa";
    protected $fillable = ["nama_depan", "nama_belakang", "nim", "fakultas_id", "jurusan_id", "negara_id", "foto", "alamat_malang", "telp", "email", "tipe"];

	public function negara(){
		return $this->belongsTo("simahin\Negara");
	}
}
