<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Untuk hapus avatar lama

class ProfileController extends Controller
{
    // 1. Tampilkan Halaman Akun
    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // 2. Simpan Perubahan
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|max:2048', // Opsional
            'password' => 'nullable|min:6|confirmed', // Opsional (hanya kalau mau ganti)
        ]);

        // A. Update Data Dasar
        $user->name = $request->name;
        $user->email = $request->email;

        // B. Cek Ganti Password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // C. Cek Ganti Avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika bukan link default
            if ($user->avatar && !str_contains($user->avatar, 'ui-avatars.com')) {
                // Bersihkan path (kadang ada 'storage/' di database, kita perlu hapus prefixnya)
                $oldPath = str_replace('storage/', '', $user->avatar);
                Storage::disk('public')->delete($oldPath);
            }
            
            // Simpan avatar baru
            $path = $request->file('avatar')->store('avatars', 'public');
            // Simpan full path agar mudah dipanggil
            $user->avatar = 'storage/' . $path; 
        }

        /** @var \App\Models\User $user */
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}