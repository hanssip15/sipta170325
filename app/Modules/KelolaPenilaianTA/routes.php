<?php

use Illuminate\Support\Facades\Route;
use App\Modules\KelolaPenilaianTA\Controllers\KelolaPenilaianTAController;

Route::group(['prefix' => 'KelolaPenilaianTA'], function () {
    Route::get('/fomulir-penilaian', [KelolaPenilaianTAController::class, 'index']);
    Route::get('/formulir-penilaian/create', [KelolaPenilaianTAController::class, 'create'])->name('formulir-penilaian.create');
    Route::get('/formulir-penilaian/detail', function () {
        return view('KelolaPenilaianTA.views.DetailFTA010');
    })->name('formulir-penilaian.detail');
    Route::get('/formulir-penilaian/edit', function () {
        return view('KelolaPenilaianTA.views.UbahFormulirTA');
    })->name('formulir-penilaian.edit');
    Route::put('/formulir-penilaian/update', [KelolaPenilaianTAController::class, 'update'])->name('formulir-penilaian.update');
    // Route::get('KelolaPenilaianTA/formulir-penilaian/edit', [FormulirPenilaianController::class, 'edit'])->name('formulir-penilaian.edit');
// Route::put('formulir-penilaian/{id}', [FormulirPenilaianController::class, 'update'])->name('formulir-penilaian.update');
});