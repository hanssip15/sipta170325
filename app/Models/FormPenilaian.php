<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormPenilaian extends Model
{
    protected $table = 'form_penilaian';
    protected $primaryKey = 'kode_fta';

    protected $fillable = [
        'nama_fta', 
        'id_prodi', 
        'jenis_form', 
        'tanggal_tenggat_pengisian', 
        'created_at', 
        'updated_at'
    ];
}
