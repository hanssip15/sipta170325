<?php

namespace App\Modules\KelolaPenilaianTA\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Support\Str;

class KelolaPenilaianTAController extends Controller
{
    

    public function index(): View
    {
        $data = [
            'header' => 'Kelola Penilaian',
            'kategori' => [
                'Seminar 1',
                'Seminar 2',
                'Seminar 3',
                'Sidang Akhir'
            ]
        ];

        return view('KelolaPenilaianTA.views.KelolaPenilaianTA', compact('data'));
    }

    public function detail_nilai_mahasiswa($kategori): View
    {
        $kategori = Str::title(str_replace('-', ' ', $kategori));

        $data = [

            'kelompok' => [
                [
                    'no' => 1,
                    'kelompok_ta' => '101',
                    'penguji' => [
                        'Dosen 1',
                        'Dosen 2'
                    ],
                    'status' => false
                ],
                [
                    'kelompok_ta' => '102',
                    'penguji' => [
                        'Dosen 3',
                        'Dosen 4'
                    ],
                    'status' => true
                ]
            ],
            'anggota_kelompok' => [
                [ [
                    'nama' => 'Mahasiswa 1',
                    'nilai' => 80,
                ], [
                    'nama' => 'Mahasiswa 2',
                    'nilai' => 85
                ] ],
                [ [
                    'nama' => 'Mahasiswa 3',
                    'nilai' => 90
                ], [
                    'nama' => 'Mahasiswa 4',
                    'nilai' => 95
                ] ]
            ]
        ];

        return view('KelolaPenilaianTA.views.DetailNilaiMahasiswa', compact('data', 'kategori'));
    }
}