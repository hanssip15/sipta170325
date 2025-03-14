<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    protected $table = 'kriteria_penilaian'; 
    protected $primaryKey = 'id_kriteria'; 

    public $timestamps = false; 

    protected $fillable = [
        'kode_fta',
        'nama_kriteria',
        'bobot_kriteria',
    ];
}
