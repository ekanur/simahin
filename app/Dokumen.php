<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
	protected $table = 'dokumen';
    protected $fillable = ['kategori_id', 'scan_file', 'expired_on', 'user_id'];
}
