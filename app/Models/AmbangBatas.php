<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbangBatas extends Model
{    
    protected $table = 'ambang_batas';
    protected $primaryKey = 'id_ambang_batas';
        
    protected $fillable = [
        'ambang_batas',
        'status_ambang_batas',
        'nip',
        'created_at',
        'updated_at'
    ];
}
