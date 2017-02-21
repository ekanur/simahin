<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
	protected $table = 'dokumen';
    protected $fillable = ['kategori_id', 'scan_file', 'expired_on', 'user_id', "created_at"];

    public function kategori_dokumen(){
    	return $this->belongsTo("simahin\KategoriDokumen", "kategori_id");
    }
}
