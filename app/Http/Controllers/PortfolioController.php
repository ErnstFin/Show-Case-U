<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    // 1. Dashboard
    public function index()
    {
        $portfolios = Portfolio::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('portfolios'));
    }

    // 2. Form Upload
    public function create()
    {
        return view('portfolios.create');
    }

    // 3. Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            // 👇 BAGIAN INI DIUBAH: Izinkan PDF & Maks 10MB
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240',
        ]);

        $path = $request->file('file')->store('portfolios', 'public');

        Portfolio::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'file_path' => $path,
            'is_public' => true,
        ]);

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil diunggah!');
    }

    // 4. Lihat Detail
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        if ($portfolio->user_id !== Auth::id()) {
            abort(403);
        }

        return view('portfolios.show', compact('portfolio'));
    }

    // 5. Form Edit
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        if ($portfolio->user_id !== Auth::id()) {
            abort(403);
        }

        return view('portfolios.edit', compact('portfolio'));
    }

    // 6. Proses Update
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            // 👇 BAGIAN INI DIUBAH: Izinkan PDF & Maks 10MB (Nullable artinya boleh kosong kalau gak ganti file)
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            if ($portfolio->file_path) {
                Storage::disk('public')->delete($portfolio->file_path);
            }
            $path = $request->file('file')->store('portfolios', 'public');
            $portfolio->file_path = $path;
        }

        $portfolio->title = $request->title;
        $portfolio->category = $request->category;
        $portfolio->description = $request->description;
        $portfolio->save();

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil diperbarui!');
    }

    // 7. Hapus Data
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->user_id !== Auth::id()) {
            abort(403);
        }

        if ($portfolio->file_path) {
            Storage::disk('public')->delete($portfolio->file_path);
        }

        $portfolio->delete();

        return redirect()->route('dashboard')->with('success', 'Portofolio berhasil dihapus.');
    }
}