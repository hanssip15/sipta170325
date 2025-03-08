<?php

use Illuminate\Support\Facades\Route;
use App\Modules\PerencanaanDanPelaksanaanSeminarDanSidang\Controllers\PerencanaanDanPelaksanaanSeminarDanSidangController;

// Route untuk menampilkan halaman presensi
Route::get('/PerencanaanDanPelaksanaanSeminarDanSidang', [PerencanaanDanPelaksanaanSeminarDanSidangController::class, 'index']);

// Route untuk menangani form submission absensi
Route::post('/presensi/hadir', [PerencanaanDanPelaksanaanSeminarDanSidangController::class, 'simpanKehadiran'])->name('presensi.hadir');

// Route untuk halaman rekap presensi koordinator TA
Route::get('/rekap-presensi', [PerencanaanDanPelaksanaanSeminarDanSidangController::class, 'rekapPresensi'])->name('rekap.presensi');


// // Route untuk menyimpan data presensi (mahasiswa)
// Route::post('/presensi/hadir', [PerencanaanDanPelaksanaanSeminarDanSidangController::class, 'simpanKehadiran'])->name('presensi.hadir');

// Route untuk reset data rekap presensi
Route::get('/rekap-presensi/reset', [PerencanaanDanPelaksanaanSeminarDanSidangController::class, 'resetRekapPresensi'])->name('rekap.presensi.reset');