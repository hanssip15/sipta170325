<?php

namespace App\Modules\PerencanaanDanPelaksanaanSeminarDanSidang\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PerencanaanDanPelaksanaanSeminarDanSidangController extends Controller
{
    public function index(): View
    {
        $dataKota = [
            (object) [
                'id' => 1,
                'kelompok' => 'KoTA 001',
                'judul_ta' => 'Sistem Informasi Akademik Berbasis Web',
                'status' => 'Seminar 3',
                'tanggal' => '2025-03-05',
            ],
            (object) [
                'id' => 2,
                'kelompok' => 'KoTA 002',
                'judul_ta' => 'Pengembangan Aplikasi Monitoring Tugas Akhir di Jurusan Teknik Komputer dan Informatika',
                'status' => 'Seminar 3',
                'tanggal' => '2025-03-06',
            ],
            (object) [
                'id' => 3,
                'kelompok' => 'KoTA 003',
                'judul_ta' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
                'status' => 'Sidang TA',
                'tanggal' => '2025-03-07',
            ]
        ];
        
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.DaftarPengajuanMahasiswa', compact('dataKota'));        
    }


    public function pengajuanDitolak(): View
    {
        $dataKota = [
            (object) [
                'kelompok' => 'KoTA 001',
                'judul_ta' => 'Sistem Informasi Akademik Berbasis Web',
                'jenis_pengajuan' => 'Seminar 3',
                'tanggal' => '2025-03-05',
                'catatan' => 'Tidak sesuai dengan ketentuan',
            ],
            (object) [
                'kelompok' => 'KoTA 002',
                'judul_ta' => 'Pengembangan Aplikasi Monitoring Tugas Akhir di Jurusan Teknik Komputer dan Informatika',
                'jenis_pengajuan' => 'Sidang TA',
                'tanggal' => '2025-03-06',
                'catatan' => 'Tidak sesuai dengan ketentuan',
            ],
            (object) [
                'kelompok' => 'KoTA 003',
                'judul_ta' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
                'jenis_pengajuan' => 'Sidang TA',
                'tanggal' => '2025-03-07',
                'catatan' => 'Tidak sesuai dengan ketentuan',
            ]
        ];

        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.DaftarPengajuanDitolak', compact('dataKota'));
    }

    public function pengajuanDiterima(): View
    {
        $dataKota = [
            (object) [
                'kelompok' => 'KoTA 001',
                'judul_ta' => 'Sistem Informasi Akademik Berbasis Web',
                'jenis_pengajuan' => 'Sidang TA',
                'tanggal' => '2025-03-05',
            ],
            (object) [
                'kelompok' => 'KoTA 002',
                'judul_ta' => 'Pengembangan Aplikasi Monitoring Tugas Akhir di Jurusan Teknik Komputer dan Informatika',
                'jenis_pengajuan' => 'Sidang TA',
                'tanggal' => '2025-03-06',
            ],
            (object) [
                'kelompok' => 'KoTA 003',
                'judul_ta' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
                'jenis_pengajuan' => 'Seminar 3',
                'tanggal' => '2025-03-07',
            ]
        ];
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.DaftarPengajuanDiterima', compact('dataKota'));
    }

    public function show($id){
        $dataKota = (object) [
            'kelompok' => 'KoTA 002',
            'judul_ta' => 'Pengembangan Aplikasi Monitoring Tugas Akhir di Jurusan Teknik Komputer dan Informatika',
            'berkas' => [
                (object) ['nama' => 'Proposal TA', 'file' => 'proposal_ta.pdf'],
                (object) ['nama' => 'Laporan TA', 'file' => 'laporan_ta.pdf'],
                (object) ['nama' => 'Presentasi TA', 'file' => 'presentasi_ta.pptx']
            ],
            'jenis_pengajuan' => 'Sidang TA',
            'catatan' => 'Tidak ada catatan',
            'tanggal' => '2025-03-06',
        ];
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.DetailPengajuan', compact('dataKota'));
    }

    public function verifikasi(Request $request, $id)
    {
        $keputusan = $request->input('keputusan');
        $catatan = $request->input('catatan', '');

        if ($keputusan === 'Ditolak') {
            // Hapus berkas (jika ada)
            $dataKota = session()->get("pengajuan_$id");
            if ($dataKota && isset($dataKota->berkas)) {
                foreach ($dataKota->berkas as $berkas) {
                    Storage::delete("public/berkas/{$berkas->file}");
                }
            }
            $status = 'Ditolak';
        } else {
            $status = 'Disetujui';
        }

        // Simpan data yang diperbarui ke sesi (bisa diganti dengan database jika diperlukan)
        session()->put("pengajuan_$id", (object) [
            'kelompok' => 'KoTA 002',
            'judul_ta' => 'Pengembangan Aplikasi Monitoring Tugas Akhir di Jurusan Teknik Komputer dan Informatika',
            'berkas' => $keputusan === 'Ditolak' ? [] : (session()->get("pengajuan_$id")->berkas ?? []),
            'jenis_pengajuan' => $jenis_pengajuan,
            'catatan' => $catatan,
            'tanggal' => '2025-03-06',
        ]);

        return redirect()->route('perencanaan.kelola-pengajuan.list')->with('success', "Pengajuan telah $status.");
    }


}


