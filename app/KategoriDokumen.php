<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    protected $table = 'kategori_dokumen';

    public function dokumen(){
    	return $this->hasMany("simahin\Dokumen");
    }
}
