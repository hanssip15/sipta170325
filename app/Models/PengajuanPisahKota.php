<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPisahKota extends Model
{
    protected $table = 'pengajuan_pisah_kota';
    protected $primaryKey = 'id_pengajuan';
    
    public $timestamps = false;

    protected $fillable = [
        'nim',
        'id_kota'
    ];
}
