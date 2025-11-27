<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

        // Optimize download with proper headers for faster response
        return Storage::disk($disk)->download($fileEntry->stored_name, $fileEntry->original_name, [
            'Content-Type' => 'application/pdf',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    public function destroy(Request $request, FileEntry $fileEntry): RedirectResponse
    {
        abort_if($fileEntry->user_id !== $request->user()->id, 403);

        $disk = config('filesystems.default');
        
        // Delete file from storage
        if (Storage::disk($disk)->exists($fileEntry->stored_name)) {
            Storage::disk($disk)->delete($fileEntry->stored_name);
        }

        // Delete database record
        $fileEntry->delete();

        return redirect()->route('home')->with('status', 'File berhasil dihapus.');
    }

    public function destroyAll(Request $request): RedirectResponse
    {
        $user = $request->user();
        $fileEntries = $user->fileEntries;
        $disk = config('filesystems.default');

        foreach ($fileEntries as $fileEntry) {
            // Delete file from storage
            if (Storage::disk($disk)->exists($fileEntry->stored_name)) {
                Storage::disk($disk)->delete($fileEntry->stored_name);
            }
        }

        // Delete all database records
        $user->fileEntries()->delete();

        return redirect()->route('home')->with('status', 'Semua file berhasil dihapus.');
    }
}

