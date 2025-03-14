<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi'; 
    protected $primaryKey = 'id_notifikasi'; 

    public $timestamps = false;

    protected $fillable = [
        'tipe_notifikasi',
        'judul',
        'isi_notifikasi',
        'sumber_notifikasi'
    ];
}
