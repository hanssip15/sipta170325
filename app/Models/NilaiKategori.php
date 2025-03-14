<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKategori extends Model
{
    protected $table = 'nilai_kategori';

    public $timestamps = false;

    protected $fillable = [
        'nim',
        'nip',
        'id_kategori',
        'nilai',
    ];
}
