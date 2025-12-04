<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Tidak perlu 'use App\Models\Cv' karena kita panggil langsung di bawah.

class CvController extends Controller
{
    // 1. Tampilkan Form Buat CV
    public function create()
    {
        // Panggil Model pakai nama lengkap (Jurus Anti Error)
        $cv = \App\Models\Cv::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        
        // Panggil view createCV
        return view('cv.createCV', compact('cv'));
    }

    // 2. Simpan Data CV
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'profession' => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required|string',
            // BARU: Validasi template
            'template' => 'required|in:template,ats_template', 
        ]);

        // Simpan Data
        \App\Models\Cv::updateOrCreate(
            ['user_id' => \Illuminate\Support\Facades\Auth::id()],
            [
                'full_name'  => $request->full_name,
                'profession' => $request->profession,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'summary'    => $request->summary,
                'skills'     => $request->skills,
                'education'  => $request->education,
                'experience' => $request->experience,
                // BARU: Simpan Pilihan Template
                'template'   => $request->template,
            ]
        );

        return redirect()->back()->with('success', 'Data CV berhasil disimpan! Siap dipreview.');
    }

    // 3. Download PDF (DIUBAH UNTUK MEMUAT TEMPLATE SESUAI PILIHAN)
    public function download()
    {
        $cv = \App\Models\Cv::where('user_id', \Illuminate\Support\Facades\Auth::id())->firstOrFail();
        
        // Tentukan view template yang akan digunakan
        $templateView = 'cv.' . $cv->template; // Contoh: 'cv.template' atau 'cv.ats_template'
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($templateView, compact('cv'));
        
        // Menggunakan stream untuk preview
        return $pdf->stream('CV_' . $cv->full_name . '.pdf'); 
    }
}