<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Models\User;
use App\Modules\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DaftarKesediaanMembimbingController extends Controller
{
    public function view_minatTopik(): View
    {
        return view('PengajuanAlokasiPembimbing.views.KesediaanBimbingan.Bidang');
    }

    public function view_daftarKesediaanMembimbing(): View
    {
        $data = DB::select("
            SELECT 
                user.nama, 
                dosen.kode_dosen, 
                dosen.id_dosen,
                dosen.nip, 
                kbk.kbk, 
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 0 
                    ELSE (dosen.maks_bimbingan_d3 + dosen.maks_bimbingan_d4) 
                END AS Jumlah_Mhs, 
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 0 
                    ELSE dosen.maks_bimbingan_d3 
                END AS Mhs_D3, 
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 0 
                    ELSE dosen.maks_bimbingan_d4 
                END AS Mhs_D4,
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 'Belum' 
                    ELSE 'Sudah' 
                END AS status_pengumpulan,
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 'Tidak bersedia' 
                    ELSE 'Bersedia' 
                END AS kesediaan_d3,
                CASE 
                    WHEN COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), '') = '' THEN 'Tidak bersedia' 
                    ELSE 'Bersedia' 
                END AS kesediaan_d4,
                COALESCE(GROUP_CONCAT(bidang.bidang SEPARATOR ', '), 'Tidak memilih bidang') AS bidang_tertarik
            FROM user
            JOIN dosen ON user.username = dosen.nip
            JOIN kbk ON dosen.id_kbk = kbk.id_kbk
            LEFT JOIN ketertarikan_bidang ON dosen.nip = ketertarikan_bidang.nip
            LEFT JOIN bidang ON ketertarikan_bidang.id_bidang = bidang.id_bidang
            GROUP BY dosen.nip, user.nama, dosen.kode_dosen, dosen.id_dosen, kbk.kbk, dosen.maks_bimbingan_d3, dosen.maks_bimbingan_d4
        ");

        return view('PengajuanAlokasiPembimbing.views.DaftarKesediaanMembimbing.DaftarKesediaanMembimbing', compact('data'));
    }
}