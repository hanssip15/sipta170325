<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';

    public $timestamps = false;

    protected $fillable = [
        'nama_prodi',
        'maksimal_anggota_kota',
        'maksimal_mahasiswa_bimbingan'
    ];
}