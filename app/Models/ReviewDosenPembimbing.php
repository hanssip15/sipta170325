<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewDosenPembimbing extends Model
{
    protected $table = 'review_dosen_pembimbing';
    protected $primaryKey = 'id_review';

    protected $fillable = [
        'review',
        'id_dokumen',
        'nip',
        'created_at',
        'updated_at'
    ];
}
