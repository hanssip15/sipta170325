<?php

use App\Modules\PengajuanAlokasiPembimbing\Controllers\KesediaanBimbinganController;
use Illuminate\Support\Facades\Route;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\PengajuanAlokasiPembimbingController;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\DaftarPengajuanDosbingController;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\RekapFTA02Controller;


Route::group(['prefix' => 'PengajuanAlokasiPembimbing'], function () {
    Route::get('/alokasi-pembimbing', [AlokasiPembimbingController::class, 'index']);
});

        Route::group(['prefix' => 'minat-bidang', 'as' => 'minat-bidang.'], function () {
            Route::get('/', [KesediaanBimbinganController::class, 'view_minatTopik'])->name('index');
            Route::post('/store', [KesediaanBimbinganController::class, 'save_minatTopik'])->name('store');
            Route::post('/add', [KesediaanBimbinganController::class, 'create_bidang'])->name('add');
        });
        Route::group(['prefix' => 'jumlah-mahasiswa', 'as' => 'jumlah-mahasiswa.'], function () {
            Route::get('/', [KesediaanBimbinganController::class, 'view_kuotaMahasiswa'])->name('index');
            Route::post('/store', [KesediaanBimbinganController::class, 'save_kuotaMahasiswa'])->name('store');
        });
        Route::group(['prefix' => 'jadwal', 'as' => 'jadwal.'], function () {
            Route::get('/', [KesediaanBimbinganController::class, 'view_jadwal'])->name('index');
            Route::post('/store', [KesediaanBimbinganController::class, 'save_jadwal'])->name('store');
        });

Route::group(['prefix' => 'DaftarPengajuanDosbing'], function () {
    Route::get('/', [DaftarPengajuanDosbingController::class, 'view_daftarPengajuanDosbing']);
});

Route::group(['prefix' => 'RekapFTA02'], function () {
    Route::get('/', [RekapFTA02Controller::class, 'view_rekapFTA02']);
});
