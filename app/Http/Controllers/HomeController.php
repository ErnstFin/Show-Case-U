<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $files = $request->user()
            ->fileEntries()
            ->latest()
            ->paginate(8);

        return view('home', [
            'files' => $files,
            'totalFiles' => $request->user()->fileEntries()->count(),
        ]);
    }

    public function download(Request $request, FileEntry $fileEntry): StreamedResponse
    {
        abort_if($fileEntry->user_id !== $request->user()->id, 403);

        $disk = config('filesystems.default');

        if (! Storage::disk($disk)->exists($fileEntry->stored_name)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk($disk)->download($fileEntry->stored_name, $fileEntry->original_name);
    }
}

