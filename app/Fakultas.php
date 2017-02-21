<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
	protected $table = 'fakultas';
	public $incrementing = false;

	public function jurusan(){
		return $this->hasMany("simahin\Jurusan");
	}
}
