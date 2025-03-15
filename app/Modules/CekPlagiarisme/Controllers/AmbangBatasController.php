<?php

namespace App\Modules\CekPlagiarisme\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AmbangBatasController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'ambang_batas' => 20, 'tanggal' => '2025-03-03', 'koordinator' => 'Maman Sumaman', 'status' => 'Sedang Digunakan'],
            ['id' => 2, 'ambang_batas' => 30, 'tanggal' => '2025-02-28', 'koordinator' => 'Maman Sumaman', 'status' => 'Tidak Digunakan'],
            ['id' => 3, 'ambang_batas' => 50, 'tanggal' => '2025-02-25', 'koordinator' => 'Maman Sumaman', 'status' => 'Tidak Digunakan']
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan (Dummy)',
            'data' => [
                'id' => rand(4, 100),
                'ambang_batas' => $request->ambang_batas,
                'tanggal' => date('Y-m-d'),
                'koordinator' => 'Maman Sumaman',
                'status' => 'Tidak Digunakan'
            ]
        ]);
    }
}
