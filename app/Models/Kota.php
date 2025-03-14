<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota'; 
    protected $primaryKey = 'id_kota'; 

    public $timestamps = false; 

    protected $fillable = [
        'judul_ta',
        'id_bidang',
        'nama_kota',
        'tahun_kota',
        'status_kota'
    ];
}
