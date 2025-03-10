<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CekPlagiarisme\Controllers\CekPlagiarismeController;

Route::get('/cekplagiarisme', [CekPlagiarismeController::class, 'index'])->name('cekplagiarisme.index');
Route::post('/cekplagiarisme/process', [CekPlagiarismeController::class, 'process'])->name('cekplagiarisme.process');
