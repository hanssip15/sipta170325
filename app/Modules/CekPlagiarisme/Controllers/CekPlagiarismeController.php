<?php

namespace App\Modules\CekPlagiarisme\Controllers;

set_time_limit(300);

use App\Modules\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Modules\CekPlagiarisme\Services\PlagiarismChecker;

class CekPlagiarismeController extends Controller
{
    public function index(): View
    {
        return view('CekPlagiarisme.views.view');
    }

    public function process(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:15360',
        ]);

        $filePath = $request->file('file')->store('uploads');
        $checker = new PlagiarismChecker();
        
        // Ekstrak teks dari file
        $result = $checker->checkPlagiarism(storage_path('app/' . $filePath));

        return view('CekPlagiarisme.views.view', [
            'results' => $result['results'],
            'percentage' => $result['percentage']
        ]);
    }
}
