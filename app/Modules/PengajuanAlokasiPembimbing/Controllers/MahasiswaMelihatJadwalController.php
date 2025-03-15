<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class MahasiswaMelihatJadwalController extends Controller
{
    public function view_MahasiswaMelihatJadwal(): View
    {

        //hardcoded nim
        $nim = 221524049;

        $query = "
        SELECT jadwal_dosen_pembimbing.hari, jadwal_dosen_pembimbing.jam_mulai, jadwal_dosen_pembimbing.jam_selesai FROM `user` 
JOIN mahasiswa ON `user`.username = mahasiswa.nim
JOIN kota ON mahasiswa.id_kota=kota.id_kota
JOIN pengajuan_pembimbing ON pengajuan_pembimbing.id_kota=kota.id_kota
JOIN alokasi_pembimbing ON alokasi_pembimbing.id_pengajuan_pembimbing=pengajuan_pembimbing.id_pengajuan_pembimbing
LEFT JOIN jadwal_dosen_pembimbing ON jadwal_dosen_pembimbing.nip=alokasi_pembimbing.nip
WHERE mahasiswa.nim=$nim AND pengajuan_pembimbing.status_pengajuan='diterima' AND alokasi_pembimbing.status_alokasi='fix'";
        $data = DB::select($query);

        dd($data);


        return view('PengajuanAlokasiPembimbing.views.MahasiswaMelihatJadwal.MahasiswaMelihatJadwal');
    }
}
