<?php

use App\Modules\PengajuanAlokasiPembimbing\Controllers\KesediaanBimbinganController;
use Illuminate\Support\Facades\Route;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\AlokasiPembimbingController;
use App\Modules\PengajuanAlokasiPembimbing\Controllers\RekapFTA02Controller;

Route::group(['prefix' => 'PengajuanAlokasiPembimbing'], function () {
    Route::get('/alokasi-pembimbing', [AlokasiPembimbingController::class, 'index']);
});

Route::group(['prefix' => 'RekapFTA02'], function () {
    Route::get('/', [RekapFTA02Controller::class, 'index']);
});
