<?php

namespace App\Modules\CekPlagiarisme\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;

class PenentuanAmbangBatas extends Controller
{
    public function index(): View
    {
        return view('CekPlagiarisme.views.PenentuanAmbangBatas');
    }
}