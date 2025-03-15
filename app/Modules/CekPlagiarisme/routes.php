<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CekPlagiarisme\Controllers\CekPlagiarismeController;
use App\Modules\CekPlagiarisme\Controllers\AmbangBatasController;

Route::get('/cek-plagiarisme', [CekPlagiarismeController::class, 'index']);
Route::get('/cek-plagiarisme/{id}', [CekPlagiarismeController::class, 'show'])->name('plagiarism.detail');
Route::prefix('cekplagiarisme')->group(function () {
    Route::get('/penentuan-ambang-batas', [AmbangBatasController::class, 'index'])->name('cekplagiarisme.ambang-batas.index');
    Route::post('/penentuan-ambang-batas', [AmbangBatasController::class, 'store'])->name('cekplagiarisme.ambang-batas.store');
});