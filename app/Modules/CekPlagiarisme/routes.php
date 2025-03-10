<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CekPlagiarisme\Controllers\PenentuanAmbangBatas;
use App\Modules\CekPlagiarisme\Controllers\CekPlagiarismeController;

Route::get('/cek-plagiarisme', [CekPlagiarismeController::class, 'index']);
Route::get('/penentuan-ambang-batas', [PenentuanAmbangBatas::class, 'index']);