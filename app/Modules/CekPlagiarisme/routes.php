<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CekPlagiarisme\Controllers\CekPlagiarismeController;
use App\Modules\CekPlagiarisme\Controllers\AmbangBatasController;

Route::get('/cek-plagiarisme', [CekPlagiarismeController::class, 'index']);
Route::get('/cek-plagiarisme/{id}', [CekPlagiarismeController::class, 'show'])->name('plagiarism.detail');
Route::get('/api/ambang-batas', [AmbangBatasController::class, 'getData']);
Route::post('/api/ambang-batas', [AmbangBatasController::class, 'store']);
// Route::middleware('auth')->post('/api/ambang-batas', [AmbangBatasController::class, 'store']);
