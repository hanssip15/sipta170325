<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'judul',
        'persentase_plagiarisme',
        'highlight_dokumen',
        'status_plagiarisme',
        'id_ambang_batas',
        'review',
        'kategori',
        'deskripsi',
        'versi',
        'ukuran_file',
        'notes',
        'id_kota',
        'id_subkategori',
        'username',
        'status_berkas',
        'created_at',
        'updated_at'
    ];
}
