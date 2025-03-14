<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRubrik extends Model
{    
    protected $table = 'detail_rubrik';
    protected $primaryKey = 'id_detail_rubrik';

    public $timestamps = false;
    
    protected $fillable = [
        'id_rubrik',
        'detail_rubrik_penilaian',
        'id_nilai',
    ];
}
