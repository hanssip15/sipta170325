<?php

use Illuminate\Support\Facades\Route;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\PengajuanAlokasiPembimbingController;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\PengajuanPembimbing\PengajuanPembimbingController;

Route::group(['prefix' => 'PengajuanAlokasiPembimbing'], function () {
    Route::group(['prefix' => 'kesediaan-membimbing'], function () {
        Route::get('/minat-bidang', [PengajuanAlokasiPembimbingController::class, 'view_minatTopik']);
    });

    Route::group(['prefix' => 'pengajuan-pembimbing'], function () {
        Route::get('/data-kelompok', [PengajuanPembimbingController::class, 'view_dataKelompok']) -> name('data-kelompok');
        Route::get('/topik-tugas-akhir', [PengajuanPembimbingController::class, 'view_topikTugasAkhir']) -> name('topik-tugas-akhir');
        Route::get('/prioritas-dosen-pembimbing', [PengajuanPembimbingController::class, 'view_prioritasDosenPembimbing']) -> name('prioritas-dosen-pembimbing');
    });
});