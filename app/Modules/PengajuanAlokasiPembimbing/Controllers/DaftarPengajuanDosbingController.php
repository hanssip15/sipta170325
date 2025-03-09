<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Models\Bidang;
use App\Models\Kota;
use App\Models\User;
use App\Modules\Controller;
use Illuminate\View\View;

class DaftarPengajuanDosbingController extends Controller
{
    public function view_daftarPengajuanDosbing(): View
{
    $kotaList = Kota::pluck('nama_kota')->toArray();
    $bidangList = Bidang::pluck('bidang')->toArray();
    $judulList = Kota::pluck('judul_ta')->toArray(); // Ambil daftar judul TA

    $kelompokData = [];

    for ($i = 0; $i < 6; $i++) {
        $kelompokData[] = [
            'id' => $i + 1,
            'kode' => $kotaList[$i % count($kotaList)] ?? 'Default Kota',
            'bidang' => $bidangList[$i % count($bidangList)] ?? 'Default Bidang',
            'judul' => $judulList[$i % count($judulList)] ?? 'Judul Default', // Gunakan judul TA dari DB
            'tanggal' => '20-04-2024',
            'anggota' => [
                ['nama' => 'Baskara', 'nim' => '221524017'],
                ['nama' => 'Adnan', 'nim' => '221524018'],
                ['nama' => 'Nina', 'nim' => '221524019'],
            ],
        ];
    }

    return view('PengajuanAlokasiPembimbing.views.DaftarPengajuanDosbing.topik', compact('kelompokData'));
}
}