<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\User;
use App\Models\PengajuanPembimbing;
use App\Models\PrioritasPembimbing;
use App\Models\AlokasiPembimbing;
use App\Models\Dosen;
use App\Models\Bidang;
use Illuminate\Support\Facades\DB;

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

        // Tambahkan List Dosen Pembimbing
        $dosenList = [
            ['id_dosen' => 'KO001N', 'nama' => 'Ade Chandra Nugraha, S.Si., M.T.', 'kbk' => 'SI & DB'],
            ['id_dosen' => 'KO002N', 'nama' => 'Ani Rahtani, S.Si., M.T.', 'kbk' => 'RPL'],
            ['id_dosen' => 'KO003N', 'nama' => 'Bambang Wisnuadhi, S.Si., M.T.', 'kbk' => 'RPL'],
            ['id_dosen' => 'KO005N', 'nama' => 'Didik Suwito Pribadi, BSCS.', 'kbk' => 'SI & DB'],
            ['id_dosen' => 'KO016N', 'nama' => 'Eddy B. Soewono, DRS., M.Kom.', 'kbk' => 'Multimedia'],
            ['id_dosen' => 'KO057N', 'nama' => 'Fitri Diani, S.Si., M.T.', 'kbk' => 'SI & DB'],
            ['id_dosen' => 'KO059N', 'nama' => 'Ghifari Munawar, S.T., M.T.', 'kbk' => 'RPL'],
            ['id_dosen' => 'KO060N', 'nama' => 'Ade Hodijah, S.T., M.T.', 'kbk' => 'SI & DB']
        ];

        return view('PengajuanAlokasiPembimbing.views.AlokasiPembimbing.AlokasiPembimbing', compact('data', 'dosenList'));
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
