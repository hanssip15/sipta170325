<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    protected $table = 'kategori_penilaian';
    protected $primaryKey = 'id_kategori';

    public $timestamps = false;

    protected $fillable = [
        'kode_fta',
        'nama_kategori',
    ];
}
