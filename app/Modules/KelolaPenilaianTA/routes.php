<?php

use Illuminate\Support\Facades\Route;
use App\Modules\KelolaPenilaianTA\Controllers\KelolaPenilaianTAController;

Route::group(['prefix' => 'KelolaPenilaianTA'], function () {
    Route::get('/pengelolaan-nilai', [KelolaPenilaianTAController::class, 'index']);
    Route::get('/detail/{kategori}', [KelolaPenilaianTAController::class, 'detail_nilai_mahasiswa']);
});
