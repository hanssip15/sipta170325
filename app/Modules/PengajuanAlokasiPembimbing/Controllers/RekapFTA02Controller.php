<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;

class RekapFTA02Controller extends Controller
{
    public function index(): View
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'kota' => "KoTA " . str_pad($i, 3, '0', STR_PAD_LEFT),
                'anggota' => [
                    "Mahasiswa " . ($i * 3 - 2),
                    "Mahasiswa " . ($i * 3 - 1),
                    "Mahasiswa " . ($i * 3),
                ],
                'jumlahMahasiswa' => 3,
                'topik' => "Topik #" . rand(1, 10),
                'judul' => "Judul Penelitian #" . rand(1, 50),
                'usulanDosen' => ["RA", "HJ", "SN", "FI", "RA"],
                'pembimbing1' => "RA",
                'pembimbing2' => "HJ",
            ];
        }

        return view('PengajuanAlokasiPembimbing.views.RekapFTA02', compact('data'));
    }
}
