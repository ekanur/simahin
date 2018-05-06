<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class TamuInternasional extends Model
{
    protected $table ="tamu_internasional";
    protected $fillable = ["nama_depan", "nama_belakang", "nim", "fakultas_id", "jurusan_id", "negara_id", "foto", "alamat_malang", "telp", "email", "tipe"];

    public function negara(){
        return $this->belongsTo("simahin\Negara");
    }

    public function tipe_kegiatan(){
        return $this->belongsTo("simahin\TipeKegiatan", "tipe");
    }

    public function fakultas(){
        return $this->belongsTo("simahin\Fakultas");
    }

    public function jurusan(){
        return $this->belongsTo("simahin\Jurusan");
    }

    public function dokumen(){
        return $this->hasMany("simahin\Dokumen");
    }
}
