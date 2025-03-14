<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuotaMembimbing extends Model
{
    protected $table = 'kuota_membimbing'; 

    public $timestamps = false; 

    protected $fillable = [
        'nip',
        'id_prodi',
        'jumlah',
    ];
}
