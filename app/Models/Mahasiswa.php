<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; 
    protected $primaryKey = 'nim';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false; 

    protected $fillable = [
        'nim',
        'tahun_masuk',
        'kelas',
        'id_prodi',
        'status_ta',
        'id_kota'
    ];
}
