<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotifikasiKirim extends Model
{
    protected $table = 'notifikasi_kirim'; 
    protected $primaryKey = 'id_kirim'; 

    public $timestamps = false;

    protected $fillable = [
        'id_notifikasi',
        'username',
        'kanal',
        'status',
        'waktu_kirim',
        'respon_log'
    ];
}
