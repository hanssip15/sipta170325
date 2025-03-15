<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class AlokasiPembimbingController extends Controller
{
    public function index(): View
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $usulanDosen = ["RA", "HJ", "SN", "FI", "RA"];
            $pembimbing1 = $usulanDosen[array_rand($usulanDosen)];
            $pembimbing2 = $usulanDosen[array_rand($usulanDosen)];

            $detailPembimbing = $this->generateDummyDosenDetail($pembimbing1);

            $data[] = [
                'kota' => "KoTA " . str_pad($i, 3, '0', STR_PAD_LEFT),
                'anggota' => [
                    "Mahasiswa " . ($i * 3 - 2),
                    "Mahasiswa " . ($i * 3 - 1),
                    "Mahasiswa " . ($i * 3),
                ],
                'bidang' => "Bidang " . rand(1, 5),
                'judul' => "Judul Penelitian " . rand(1, 50),
                'usulanDosen' => $usulanDosen,
                'pembimbing1' => $pembimbing1,
                'pembimbing2' => $pembimbing2,
                'detailPembimbing' => $detailPembimbing
            ];
        }

        return view('PengajuanAlokasiPembimbing.views.AlokasiPembimbing.AlokasiPembimbing', compact('data'));
    }

    public function getDetailDosen($nama): JsonResponse
    {
        return response()->json($this->generateDummyDosenDetail($nama));
    }

    private function generateDummyDosenDetail($nama): array
    {
        $pembimbing1_KoTA = rand(5, 15);
        $pembimbing2_KoTA = rand(3, 10);
        $jumlah_KoTA = $pembimbing1_KoTA + $pembimbing2_KoTA;

        $pembimbing1_Mhs = rand(10, 30);
        $pembimbing2_Mhs = rand(5, 20);
        $jumlahMahasiswa = $pembimbing1_Mhs + $pembimbing2_Mhs;

        $kuota = rand(20, 40);
        $kelebihan = max(0, $jumlahMahasiswa - $kuota);

        return [
            "nama" => "Dosen " . $nama,
            "pembimbing1_KoTA" => $pembimbing1_KoTA,
            "pembimbing2_KoTA" => $pembimbing2_KoTA,
            "jumlah_KoTA" => $jumlah_KoTA,
            "pembimbing1_Mhs" => $pembimbing1_Mhs,
            "pembimbing2_Mhs" => $pembimbing2_Mhs,
            "jumlahMahasiswa" => $jumlahMahasiswa,
            "kuota" => $kuota,
            "kelebihan" => $kelebihan
        ];
    }
}
