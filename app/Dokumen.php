<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
	use SoftDeletes;
	protected $table = 'dokumen';
    protected $fillable = ['kategori_id', 'scan_file', 'expired_on', 'tamu_internasional_id', "created_at"];
    protected $dates = ['deleted_at'];
    
    public function kategori_dokumen(){
    	return $this->belongsTo("simahin\KategoriDokumen", "kategori_id");
    }
}
