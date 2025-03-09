<?php

namespace App\Modules\PengajuanAlokasiPembimbing\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;

class PengelolaanPeriodeController extends Controller
{
    public function view_PengelolaanPeriode(): View
    {
        return view('PengajuanAlokasiPembimbing.Views.PengelolaanPeriode.PengelolaanPeriode');
    }
}