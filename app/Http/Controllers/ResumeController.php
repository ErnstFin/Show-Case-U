<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveResumeRequest; // BARU: Import SaveResumeRequest
use App\Models\FileEntry;
use App\Models\Resume;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    // PERBAIKAN: Menggunakan SaveResumeRequest untuk validasi
    public function store(SaveResumeRequest $request) 
    {
        // Validasi dan data yang divalidasi diambil otomatis
        $validated = $request->validated();

        $resume = Resume::create([
            'user_id' => auth()->id(),
            ...$validated
        ]);

        return response()->json([
            'success' => true,
            'resume' => $resume,
            'message' => 'Resume saved successfully'
        ]);
    }

    // PERBAIKAN: Menggunakan SaveResumeRequest untuk validasi
    public function update(SaveResumeRequest $request, Resume $resume)
    {
        // Validasi dan data yang divalidasi diambil otomatis
        $validated = $request->validated();

        $resume->update($validated);

        return response()->json([
            'success' => true,
            'resume' => $resume,
            'message' => 'Resume updated successfully'
        ]);
    }

    public function download(Resume $resume)
    {
        // Tidak ada perubahan besar pada metode ini.
        $html = View::make('resume.pdf', ['resume' => $resume])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = str_replace(' ', '_', $resume->full_name ?? 'resume') . '_CV.pdf';

        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    // Perbaikan kecil: Memperketat validasi 'email' agar WAJIB
    public function downloadFromData(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255', // PERBAIKAN: 'email' wajib
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city_state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|string',
            'summary' => 'nullable|string',
            'employment_history' => 'nullable|array',
            'education' => 'nullable|array',
            'skills' => 'nullable|array',
            'languages' => 'nullable|array',
            'certifications' => 'nullable|array',
            'additional_sections' => 'nullable|array',
        ]);

        $html = View::make('resume.pdf-data', ['data' => $validated])->render();

        // Optimize Dompdf options for faster rendering
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', false); // Disable remote for faster processing
        $options->set('defaultFont', 'Arial');
        $options->set('isPhpEnabled', false); // Disable PHP for security and speed
        $options->set('isJavascriptEnabled', false); // Disable JS for speed
        $options->set('dpi', 96); // Lower DPI for faster rendering (still good quality)
        $options->set('enableCssFloat', false); // Disable CSS float for speed

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfOutput = $dompdf->output();

        $fullName = trim(($validated['first_name'] ?? '') . ' ' . ($validated['last_name'] ?? ''));
        $filename = ($fullName ? str_replace(' ', '_', $fullName) : 'resume') . '_CV.pdf';

        // Save to database and storage (optimized for speed)
        if ($request->user()) {
            $user = $request->user();
            $disk = config('filesystems.default');
            $path = 'resumes/'.$user->id.'/'.now()->format('Ymd_His').'_'.Str::random(6).'.pdf';
            
            // Save file first (fast operation)
            Storage::disk($disk)->put($path, $pdfOutput);

            // Then save to database (also fast)
            Resume::create([
                'user_id' => $user->id,
                ...$validated,
            ]);

            FileEntry::create([
                'user_id' => $user->id,
                'original_name' => $filename,
                'stored_name' => $path,
                'mime_type' => 'application/pdf',
                'size' => strlen($pdfOutput),
            ]);
        }

        // Return optimized response with proper headers for fast download
        return response()->streamDownload(function () use ($pdfOutput) {
            echo $pdfOutput;
        }, $filename, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ]);
    }
}