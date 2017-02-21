<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	protected $table = 'jurusan';
    public $incrementing = false;

    public function fakultas(){
    	return $this->belongsTo("simahin\Fakultas");
    }
}
