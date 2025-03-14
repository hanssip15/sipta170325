<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferensiKota extends Model
{
    protected $table = 'preferensi_kota';

    public $timestamps = false;

    protected $fillable = [
        'nip',
        'id_kota'
    ];
}
