<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetertarikanBidang extends Model
{
    protected $table = 'ketertarikan_bidang';
    protected $primaryKey = 'id_ketertarikan_bidang';
    
    public $timestamps = false;

    protected $fillable = [
        'nip',
        'id_bidang'
    ];
}