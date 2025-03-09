<?php

use App\Modules\PengajuanAlokasiPembimbing\Controllers\KesediaanBimbinganController;
use Illuminate\Support\Facades\Route;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\PengajuanAlokasiPembimbingController;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\DaftarPengajuanDosbingController;


Route::group(['prefix' => 'PengajuanAlokasiPembimbing', 'as' => 'pengajuanalokasipembimbing.'], function () {
    Route::group(['prefix' => 'kesediaan-membimbing', 'as' => 'kesediaan-membimbing.'], function () {
        Route::group(['prefix' => 'minat-bidang', 'as' => 'minat-bidang.'], function () {
            Route::get('/', [KesediaanBimbinganController::class, 'view_minatTopik'])->name('index');
            Route::post('/store', [KesediaanBimbinganController::class, 'save_minatTopik'])->name('store');
        });
        Route::get('/jumlah-mahasiswa', [KesediaanBimbinganController::class, 'view_kuotaMahasiswa'])->name('jumlah-mahasiswa');
        Route::get('/jadwal', [KesediaanBimbinganController::class, 'view_jadwal'])->name('jadwal');
    });
});

Route::group(['prefix' => 'DaftarPengajuanDosbing'], function () {
    Route::get('/', [DaftarPengajuanDosbingController::class, 'view_daftarPengajuanDosbing']);
});