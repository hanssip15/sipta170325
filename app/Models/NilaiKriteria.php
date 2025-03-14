<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    protected $table = 'nilai_kriteria';

    protected $fillable = [
        'nim',
        'nip',
        'id_kriteria',
        'nilai_kriteria',
        'status_penilaian',
        'created_at',
        'updated_at'
    ];
}
