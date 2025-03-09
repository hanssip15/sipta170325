<?php

namespace App\Modules\PerencanaanDanPelaksanaanSeminarDanSidang\Controllers;

use App\Modules\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PerencanaanDanPelaksanaanSeminarDanSidangController extends Controller
{
    public function index(): View
    {
        // Simulasikan waktu sekarang
        // $sekarang = now(); // Gunakan waktu sekarang
        $sekarang = Carbon::parse('2025-06-22 12:30:00'); // Untuk simulasi

        // Data presensi sementara
        $presensi = [
            [
                'nim' => '221524033',
                'mahasiswa' => 'Bang Jay',
                'id_kota' => '2',
                'tanggal' => '22-06-2025',
                'ruangan' => '22jtk44',
                'sesi' => '2',
                'waktu_sidang' => '2025-06-22 12:00:00', // Waktu sidang
                'status_hadir' => session('status_hadir_221524033', 'belum_absensi'),
                'dokumentasi' => session('dokumentasi_221524033', '') // Ambil data dokumentasi dari session
            ],
        ];

        // Teruskan $sekarang dan $presensi ke view
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.view', compact('presensi', 'sekarang'));
    }

    public function rekapPresensi(): View
    {
        // Data presensi sementara
        $presensi = [
            [
                'nim' => '221524033',
                'mahasiswa' => 'Bang Jay',
                'id_kota' => '2',
                'tanggal' => '22-06-2025',
                'ruangan' => '22jtk44',
                'sesi' => '2',
                'waktu_sidang' => '2025-06-22 12:00:00', // Waktu sidang
                'status_hadir' => session('status_hadir_221524033', 'belum_absensi'),
                'dokumentasi' => session('dokumentasi_221524033', '') // Ambil data dokumentasi dari session
            ],
            [
                'nim' => '221524034',
                'mahasiswa' => 'Bang Jono',
                'id_kota' => '2',
                'tanggal' => '22-06-2025',
                'ruangan' => '22jtk44',
                'sesi' => '2',
                'waktu_sidang' => '2025-06-22 12:00:00', // Waktu sidang
                'status_hadir' => session('status_hadir_221524034', 'belum_absensi'),
                'dokumentasi' => session('dokumentasi_221524034', '') // Ambil data dokumentasi dari session
            ],
            [
                'nim' => '221524035',
                'mahasiswa' => 'Bang Jarwo',
                'id_kota' => '2',
                'tanggal' => '22-06-2025',
                'ruangan' => '22jtk44',
                'sesi' => '2',
                'waktu_sidang' => '2025-06-22 12:00:00', // Waktu sidang
                'status_hadir' => session('status_hadir_221524035', 'belum_absensi'),
                'dokumentasi' => session('dokumentasi_221524035', '') // Ambil data dokumentasi dari session
            ]
        ];

        // Teruskan $presensi ke view rekap
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.rekap_presensi_seminar_3', compact('presensi'));
    }

    public function simpanKehadiran(Request $request)
    {
        // Validasi request
        $request->validate([
            'nim' => 'required|string', // Hanya butuh NIM untuk update status
        ]);
    
        // Simpan status kehadiran di session
        session(["status_hadir_{$request->input('nim')}" => 'hadir']);
    
        return redirect()->back()->with('success', 'Status kehadiran berhasil disimpan.');
    }

    public function simpanDokumentasi(Request $request)
    {
        // Validasi request
        $request->validate([
            'nim' => 'required|string',
            'dokumentasi' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120', // Max 5 MB
        ], [
            'dokumentasi.max' => 'Ukuran file tidak boleh lebih dari 5 MB.', // Pesan custom
        ]);
    
        // Ambil NIM dari request
        $nim = $request->input('nim');
    
        // Cek apakah ada file lama di session
        $fileLama = session("dokumentasi_{$nim}");
    
        // Jika ada file lama, hapus dari storage
        if ($fileLama && Storage::disk('public')->exists($fileLama)) {
            Storage::disk('public')->delete($fileLama);
        }
    
        // Simpan file baru ke storage
        $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi', 'public');
    
        // Simpan path file baru ke session
        session(["dokumentasi_{$nim}" => $dokumentasiPath]);
    
        return redirect()->back()->with('success', 'Dokumentasi berhasil diupload.');
    }
}