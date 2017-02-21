<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ="user";
    protected $fillable = ["nama_depan", "nama_belakang", "nim", "fakultas_id", "jurusan_id", "negara_id", "foto", "alamat_malang", "telp", "email", "tipe"];

    public function negara(){
        return $this->belongsTo("simahin\Negara");
    }

    public function tipe_user(){
        return $this->belongsTo("simahin\TipeUser", "tipe");
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
