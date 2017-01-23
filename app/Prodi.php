<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
	protected $table="prodi";
    protected $fillable=['nama', "fakultas", "jenjang", "no_sk", "expired_date", "nilai", "peringkat", "status", "keterangan", "file"];
    public $timestamps=false;
}
