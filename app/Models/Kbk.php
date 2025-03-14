<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kbk extends Model
{
    protected $table = 'kbk';
    protected $primaryKey = 'id_kbk';

    public $timestamps = false;
    
    protected $fillable = [
        'kbk'
    ];

}