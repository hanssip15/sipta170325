<?php

namespace App\Modules\PerencanaanDanPelaksanaanSeminarDanSidang\Controllers;

use App\Modules\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class PerencanaanDanPelaksanaanSeminarDanSidangController extends Controller
{
    public function index(): View
    {
        // Simulasikan waktu sekarang
        // $sekarang = now(); // Gunakan waktu sekarang
        $sekarang = Carbon::parse('2023-10-30 11:30:00'); // Untuk simulasi, uncomment baris ini

        // Data presensi sementara
        $presensi = [
            [
                'nim' => '22152400X',
                'mahasiswa' => 'Fakri Arisha',
                'kota' => '2',
                'tanggal' => 'AK-KK-KK',
                'ruangan' => 'XXX',
                'sesi' => '2',
                'waktu_sidang' => '2023-10-30 10:00:00', // Waktu sidang
                'status_kehadiran' => session('status_kehadiran_22152400X', 'belum_absensi'),
                'dokumentasi' => ''
            ],
            [
                'nim' => '22152400Y',
                'mahasiswa' => 'John Doe',
                'kota' => '1',
                'tanggal' => 'AK-KK-KK',
                'ruangan' => 'YYY',
                'sesi' => '1',
                'waktu_sidang' => '2023-10-30 14:00:00', // Waktu sidang
                'status_kehadiran' => session('status_kehadiran_22152400Y', 'belum_absensi'),
                'dokumentasi' => ''
            ]
        ];

        // Teruskan $sekarang dan $presensi ke view
        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.view', compact('presensi', 'sekarang'));
    }

    public function simpanKehadiran(Request $request)
    {
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $status = $request->input('status');

        // Simpan data presensi ke session
        $presensi = session('rekap_presensi', []); // Ambil data yang sudah ada
        $presensi[] = [
            'nim' => $nim,
            'nama' => $nama,
            'kota' => $request->input('kota'), // Ambil data kota dari request
            'tanggal' => now()->format('Y-m-d'), // Tanggal saat ini
            'ruangan' => $request->input('ruangan'), // Ambil data ruangan dari request
            'sesi' => $request->input('sesi'), // Ambil data sesi dari request
            'status_kehadiran' => $status,
            'dokumentasi' => '' // Isi sesuai kebutuhan
        ];

        session(['rekap_presensi' => $presensi]); // Simpan kembali ke session

        // Simpan status kehadiran di session untuk mahasiswa tertentu
        session(["status_kehadiran_$nim" => $status]);

        return redirect()->back()->with('success', 'Status kehadiran berhasil disimpan.');
    }

    public function rekapPresensi(): View
    {
        // Ambil data presensi dari session
        $rekapPresensi = session('rekap_presensi', []);

        return view('PerencanaanDanPelaksanaanSeminarDanSidang.views.rekap_presensi', compact('rekapPresensi'));
    }

    public function resetRekapPresensi()
    {
        // Hapus data presensi dari session
        session()->forget('rekap_presensi');

        return redirect()->route('rekap.presensi')->with('success', 'Data rekap presensi berhasil direset.');
    }
}