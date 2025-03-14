<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SumberNilai extends Model
{
    protected $table = 'sumber_nilai';
    protected $primaryKey = 'id_sumber';

    public $timestamps = false;

    protected $fillable = [
        'sumber'
    ];
}
