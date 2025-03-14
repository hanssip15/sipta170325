<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubrik extends Model
{
    protected $table = 'rubrik';
    protected $primaryKey = 'id_rubrik';

    public $timestamps = false;

    protected $fillable = [
        'id_kriteria',
        'nama_rubrik',
    ];        
}
