<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
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

    public function update(Request $request, Resume $resume)
    {
        $validated = $request->validate([
            'job_title' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
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

        $resume->update($validated);

        return response()->json([
            'success' => true,
            'resume' => $resume,
            'message' => 'Resume updated successfully'
        ]);
    }

    public function download(Resume $resume)
    {
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

    public function downloadFromData(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
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

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfOutput = $dompdf->output();

        $fullName = trim(($validated['first_name'] ?? '') . ' ' . ($validated['last_name'] ?? ''));
        $filename = ($fullName ? str_replace(' ', '_', $fullName) : 'resume') . '_CV.pdf';

        if ($request->user()) {
            $user = $request->user();
            Resume::create([
                'user_id' => $user->id,
                ...$validated,
            ]);

            $disk = config('filesystems.default');
            $path = 'resumes/'.$user->id.'/'.now()->format('Ymd_His').'_'.Str::random(6).'.pdf';
            Storage::disk($disk)->put($path, $pdfOutput);

            FileEntry::create([
                'user_id' => $user->id,
                'original_name' => $filename,
                'stored_name' => $path,
                'mime_type' => 'application/pdf',
                'size' => strlen($pdfOutput),
            ]);
        }

        return response()->streamDownload(function () use ($pdfOutput) {
            echo $pdfOutput;
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
