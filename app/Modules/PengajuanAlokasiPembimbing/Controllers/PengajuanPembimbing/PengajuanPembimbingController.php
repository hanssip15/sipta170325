<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers\PengajuanPembimbing;

use App\Models\User;
use App\Modules\Controller;
use Illuminate\View\View;

class PengajuanPembimbingController extends Controller
{
    public function view_dataKelompok(): View
    {
        return view('PengajuanAlokasiPembimbing.views.PengajuanPembimbing.DataKelompok');
    }

    public function view_topikTugasAkhir(): View
    {
        return view('PengajuanAlokasiPembimbing.views.PengajuanPembimbing.TopikTugasAkhir');
    }

    public function view_prioritasDosenPembimbing(): View
    {
        return view('PengajuanAlokasiPembimbing.views.PengajuanPembimbing.PrioritasDosenPembimbing');
    }
}