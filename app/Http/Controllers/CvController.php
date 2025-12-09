<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Tidak perlu 'use App\Models\Cv' karena kita panggil langsung di bawah.

class CvController extends Controller
{
    // 1. Tampilkan Form Buat CV (Diubah untuk menangani pilihan template)
    public function create($template = null)
    {
        // Ambil data CV yang sudah ada
        $cv = \App\Models\Cv::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();

        // Jika template dipilih dari URL, gunakan itu. 
        // Jika tidak, gunakan template yang tersimpan di DB, atau default 'template'.
        $selectedTemplate = $template ?: ($cv->template ?? 'template');

        // Panggil view createCV
        return view('cv.createCV', compact('cv', 'selectedTemplate'));
    }

    // 2. Simpan Data CV (Perbaiki Validasi dan Tambahkan Template)
    public function store(Request $request)
    {
        // Pastikan semua field wajib (required) divalidasi
        $validated = $request->validate([
            'full_name'  => 'required|string',
            'profession' => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'summary'    => 'required|string',
            'skills'     => 'required|string',
            'education'  => 'required|string',
            'experience' => 'required|string',
            'template'   => 'required|in:template,ats_template',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Max 5MB
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cv_photos', 'public');
        }

        // Get existing CV to preserve photo if not updated
        $cv = \App\Models\Cv::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();
        if ($cv && !$request->hasFile('photo')) {
            $photoPath = $cv->photo_path; // Keep existing photo
        }

        // Simpan Data
        \App\Models\Cv::updateOrCreate(
            ['user_id' => \Illuminate\Support\Facades\Auth::id()],
            [
                'full_name'  => $validated['full_name'],
                'profession' => $validated['profession'],
                'email'      => $validated['email'],
                'phone'      => $validated['phone'],
                'address'    => $validated['address'],
                'summary'    => $validated['summary'],
                'skills'     => $validated['skills'],
                'education'  => $validated['education'],
                'experience' => $validated['experience'],
                'template'   => $validated['template'],
                'photo_path' => $photoPath,
            ]
        );

        return redirect()->back()->with('success', 'Data CV berhasil disimpan! Siap dipreview.');
    }

    // 3. Download/Preview PDF (Menggunakan Stream)
    public function download()
    {
        // Pastikan CV ada sebelum mencoba mengunduh
        $cv = \App\Models\Cv::where('user_id', \Illuminate\Support\Facades\Auth::id())->firstOrFail();
        
        // Tentukan view template yang akan digunakan
        $templateView = 'cv.' . $cv->template; 
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($templateView, compact('cv'));
        
        // Menggunakan stream untuk preview
        return $pdf->stream('CV_' . $cv->full_name . '.pdf'); 
    }

    // 4. Edit CV
    public function edit($id)
    {
        $cv = \App\Models\Cv::findOrFail($id);
        
        // Pastikan user hanya bisa edit CV miliknya sendiri
        if ($cv->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        $selectedTemplate = $cv->template;
        return view('cv.edit-cv', compact('cv', 'selectedTemplate'));
    }

    // 5. Update CV
    public function update($id, Request $request)
    {
        $cv = \App\Models\Cv::findOrFail($id);
        
        // Pastikan user hanya bisa update CV miliknya sendiri
        if ($cv->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        // Validasi data
        $validated = $request->validate([
            'full_name'  => 'required|string',
            'profession' => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'summary'    => 'required|string',
            'skills'     => 'required|string',
            'education'  => 'required|string',
            'experience' => 'required|string',
            'template'   => 'required|in:template,ats_template',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle photo upload
        $photoPath = $cv->photo_path; // Keep existing photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cv_photos', 'public');
        }

        // Update data
        $cv->update(array_merge($validated, ['photo_path' => $photoPath]));

        return redirect()->route('dashboard')->with('success', 'CV berhasil diperbarui!');
    }

    // 6. Delete CV
    public function destroy($id)
    {
        $cv = \App\Models\Cv::findOrFail($id);
        
        // Pastikan user hanya bisa delete CV miliknya sendiri
        if ($cv->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        $cv->delete();

        return redirect()->route('dashboard')->with('success', 'CV berhasil dihapus!');
    }
}