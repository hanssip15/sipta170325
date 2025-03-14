<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangFasilitas extends Model
{
    protected $table = 'ruang_fasilitas';
    protected $primaryKey = [
        'id_ruangan', 
        'id_fasilitas'
    ];

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_ruangan',
        'id_fasilitas',
        'jumlah_fasilitas'
    ];
}
