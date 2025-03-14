<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailFeedback extends Model
{    
    protected $table = 'detail_feedback';
    protected $primaryKey = 'id_detail_feedback';

    public $timestamps = false;
    
    protected $fillable = [
        'id_feedback',
        'id_kota',
        'nip',
        'status_penilaian',
        'isi_feedback'
    ];
}
