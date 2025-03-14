<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{    
    protected $table = 'dosen';
    protected $primaryKey = 'nip';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_prodi',
        'id_kbk',
        'id_dosen',
        'kode_dosen',
        'status_dosen',
        'role_dosen',
        'bersedia_membimbing'
    ];
}
