<?php

namespace App\Modules\KelolaPenilaianTA\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelolaPenilaianTAController extends Controller
{
    public function index_form(): View
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

    public function index(): View
    {
        return view('KelolaPenilaianTA.views.view');
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
            ],
        ];

        return view('KelolaPenilaianTA.views.UbahFormulirTA', compact('formulir'));
    }

    public function update(Request $request)
    {
        return redirect()->route('formulir-penilaian.index')->with('success', 'Formulir penilaian berhasil diperbarui.');
    }

    public function indexMonitoringMahasiswa(): View
    {
        return view('KelolaPenilaianTA.views.monitoring_mahasiswa');
    }

    public function indexMonitoringFeedback(): View
    {
        return view('KelolaPenilaianTA.views.monitoring_feedback');
    }

    public function indexMonitoringRubrik(): View
    {
        return view('KelolaPenilaianTA.views.monitoring_rubrik');
    }

    public function kelola_nilai(): View
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
        $data = [];
        $kategori = Str::title(str_replace('-', ' ', $kategori));

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'nama' => "Nama Mahasiswa #" . $i,
                'kelompok' => rand(1, 100),
                'penguji1' => 'penguji 1',
                'penguji2' => 'penguji 2',
                'penguji3' => 'penguji 3',
                'pembimbing1' => rand(50, 100),
                'pembimbing2' => rand(50, 100),
                'p1' => rand(50, 100),
                'p2' => rand(50, 100),
                'p3' => rand(50, 100),
                'rata_rata' => rand(50, 100),
            ];
        }

        return view('KelolaPenilaianTA.views.DetailNilaiMahasiswa', compact('data', 'kategori'));
    }

    public function get_rekap_nilai(): View
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'nim' => "221524" . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama' => "Nama Mahasiswa #" . $i,
                'prodi' => (rand(0, 1) == 0) ? "D3-Teknik Informatika" : "D4-Teknik Informatika",
                'kelas' => (rand(0, 1) == 0) ? "4A" : "4B",
                'kelompok' => "Kelompok " . rand(1, 5),
                'seminar2_penguji1' => rand(50, 100),
                'seminar2_penguji2' => rand(50, 100),
                'seminar2_penguji3' => -1,
                'seminar3_penguji1' => rand(50, 100),
                'seminar3_penguji2' => rand(50, 100),
                'seminar3_penguji3' => rand(50, 100),
                'sidang_penguji1' => rand(50, 100),
                'sidang_penguji2' => rand(50, 100),
                'sidang_penguji3' => rand(50, 100),
                'pembimbing1' => rand(50, 100),
                'pembimbing2' => rand(50, 100),
                'uts' => rand(50, 100),
                'uas' => rand(50, 100),
                'lain_lain' => rand(50, 100),
                'nilai_akhir' => rand(50, 100),
                'predikat' => ["A", "B", "C", "D", "E"][rand(0, 4)]
            ];
        }

        return view('KelolaPenilaianTA.views.RekapitulasiNilai', compact('data'));
    }

    public function exportExcel(Request $request)
    {
        // Ambil filter dari request
        $filterProdi = $request->query('prodi');
        $filterKelas = $request->query('kelas');

        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'nim' => "221524" . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama' => "Nama Mahasiswa #" . $i,
                'prodi' => (rand(0, 1) == 0) ? "D3-Teknik Informatika" : "D4-Teknik Informatika",
                'kelas' => (rand(0, 1) == 0) ? "4A" : "4B",
                'kelompok' => "Kelompok " . rand(1, 5),
                'seminar2_penguji1' => rand(50, 100),
                'seminar2_penguji2' => rand(50, 100),
                'seminar2_penguji3' => -1,
                'seminar3_penguji1' => rand(50, 100),
                'seminar3_penguji2' => rand(50, 100),
                'seminar3_penguji3' => rand(50, 100),
                'sidang_penguji1' => rand(50, 100),
                'sidang_penguji2' => rand(50, 100),
                'sidang_penguji3' => rand(50, 100),
                'pembimbing1' => rand(50, 100),
                'pembimbing2' => rand(50, 100),
                'uts' => rand(50, 100),
                'uas' => rand(50, 100),
                'lain_lain' => rand(50, 100),
                'nilai_akhir' => rand(50, 100),
                'predikat' => ["A", "B", "C", "D", "E"][rand(0, 4)]
            ];
        }

        // Terapkan filter
        if ($filterProdi) {
            $data = array_filter($data, function ($item) use ($filterProdi) {
                return $item['prodi'] == $filterProdi;
            });
        }

        if ($filterKelas) {
            $data = array_filter($data, function ($item) use ($filterKelas) {
                return $item['kelas'] == $filterKelas;
            });
        }

        // Ubah ke array agar bisa diekspor
        $data = array_values($data);

        return Excel::download(new RekapitulasiNilaiExport($data), 'rekapitulasi_nilai.xlsx');
    }
}