<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekFeedback extends Model
{    
    protected $table = 'aspek_feedback';
    protected $primaryKey = 'id_feedback';

    public $timestamps = false;
    
    protected $fillable = [
        'id_feedback',
        'kode_fta',
        'nama_aspek_feedback',
    ];
}
