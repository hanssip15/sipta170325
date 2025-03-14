<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListKalimatPlagiarisme extends Model
{
    protected $table = 'list_kalimat_plagiarisme'; 
    protected $primaryKey = 'id_kalimat'; 

    public $timestamps = false; 

    protected $fillable = [
        'id_dokumen',
        'id_jurnal',
        'kalimat_plagiat'
    ];
}
