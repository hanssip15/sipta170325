<?php

namespace App\Modules\CekPlagiarisme\Controllers;

use App\Modules\Controller;
use Illuminate\View\View;

class CekPlagiarismeController extends Controller
{
    public function index(): View
    {
        return view('CekPlagiarisme.views.view'); // Sesuai dengan lokasi dalam modul
    }
    
    public function show($id)
    {
        // Data dummy untuk tampilan frontend
        $dokumen = (object) [
            'id' => $id,
        ];
    
        return view('CekPlagiarisme.views.detail', compact('dokumen')); // Harus sesuai dengan struktur dalam modul
    }    
}