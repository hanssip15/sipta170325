<?php

namespace App\Modules\KelolaPenilaianTA\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;

class KelolaPenilaianTAController extends Controller
{
    public function index(): View
    {
        for ($i = 1; $i <= 100; $i++) {
            $data = [
                [
                    'kode' => 'FTA 04',
                    'nama' => 'Penilaian Seminar I',
                ],
                [
                    'kode' => 'FTA 07',
                    'nama' => 'Penilaian Semester II',
                ],
                [
                    'kode' => 'FTA 08',
                    'nama' => 'Masukan Seminar II',
                ],
                [
                    'kode' => 'FTA 011',
                    'nama' => 'Penilaian Semester III',
                ],
                [
                    'kode' => 'FTA 012',
                    'nama' => 'Masukan Seminar III',
                ],
            ];
        }

        return view('KelolaPenilaianTA.views.FormulirPenilaianTA', compact('data'));
    }

    public function create(): View
    {
        return view('KelolaPenilaianTA.views.TambahFormulirPenilaian');
    }

    public function edit()
    {
        // Data dummy untuk sementara
        $formulir = (object) [
            'kodeFTA' => 'FTA.011',
            'namaFTA' => 'PENILAIAN SEMINAR III',
            'tanggalTenggat' => '2025-03-05',
            'waktuTenggat' => '23:59',
            'aspekPenilaian' => [
                (object) [
                    'kriteria' => 'Kejelasan isi dokumen',
                    'bobot' => 40,
                    'detail' => 'Kejelasan kaitan antar bab/sub bab/kaitan (hubungan sebab akibat/ reasoning, rasionalitas)',
                    'lebih80' => 'Deskripsi sangat jelas dan rinci',
                    'tujuhPuluhLima' => 'Deskripsi cukup jelas namun ada bagian yang perlu diperjelas',
                    'tujuhPuluh' => 'Deskripsi kurang jelas dan perlu banyak perbaikan',
                    'enamPuluhLima' => 'Deskripsi tidak jelas dan membingungkan',
                    'enamPuluh' => 'Deskripsi tidak jelas dan membingungkan',
                    'kurang60' => 'Deskripsi tidak jelas dan membingungkan',
                ],
                // Tambahkan aspek penilaian lainnya sesuai kebutuhan
            ],
        ];

        return view('KelolaPenilaianTA.views.UbahFormulirTA', compact('formulir'));
    }

    public function update(Request $request)
    {
        // Logika untuk memperbarui data formulir penilaian
        // Misalnya, simpan data ke database atau lakukan operasi lainnya

        return redirect()->route('formulir-penilaian.index')->with('success', 'Formulir penilaian berhasil diperbarui.');
    }
}