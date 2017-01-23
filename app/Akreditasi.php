<?php

namespace simahin;

use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    //
    protected $fillable=['nama', "fakultas", "jenjang", "no_sk", "expired_date", "nilai", "peringkat", "status", "keterangan", "file"];
}
