<?php

namespace App\Modules\CekPlagiarisme\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use App\Models\Dokumen;

class CekPlagiarismeController extends Controller
{
    public function getData()
    {
        // Ambil semua data dokumen beserta relasi ke ambang batas
        $dokumen = Dokumen::with('AmbangBatas', 'User')->get();

        // Format data agar sesuai dengan struktur jsGrid
        $data = $dokumen->map(function ($item) {
            return [
                'id_dokumen' => $item->id_dokumen,
                'judul' => $item->judul,
                'waktu' => $item->created_at->format('Y-m-d H:i:s'),
                'penulis' => $item->user ? $item->user->nama : 'Tidak Diketahui',
                'persentase_plagiarisme' => $item->persentase_plagiarisme,
                'ambang_batas' => $item->ambangBatas ? $item->ambangBatas->ambang_batas : null, // Ambil nilai ambang batas
                'status' => $this->getStatus($item->persentase_plagiarisme, $item->ambangBatas ? $item->ambangBatas->ambang_batas : 20), // Default 20 jika tidak ada
                'review' => $item->review
            ];
        });

        return response()->json($data);
    }

    private function getStatus($persentase, $ambangBatas)
    {
        if ($persentase === null) {
            return '<span class="badge badge-warning">Processing</span>';
        } elseif ($persentase < $ambangBatas) {
            return '<span class="badge badge-success">Tidak Plagiat</span>';
        } else {
            return '<span class="badge badge-danger">Plagiat</span>';
        }
    }
    public function show($id): View
    {
        // Data dummy untuk detail dokumen
        $dokumen = (object) [
            'id' => $id,
            'judul' => 'Implementasi Algoritma Naive',
            'waktu' => '28-02-2025 14:20:14',
            'penulis' => 'Mumun Sumumun',
            'file' => null, // Jika ingin menampilkan file, gunakan 'contoh.pdf'
            'isi' => 'Ini adalah contoh isi dokumen.',
            'presentase' => 50,
            'komentar' => 'Gunakan sumber referensi yang sahih, minimal Sinta 3',
        ];

        return view('CekPlagiarisme.views.detail', compact('dokumen'));
    }   
}
