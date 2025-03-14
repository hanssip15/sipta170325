<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';  
    protected $primaryKey = 'id_ruangan';

    public $timestamps = false;

    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'status_ruangan',
        'kode_gedung',
        'link_ruangan'
    ];
}
