<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    // 1. Mengarahkan user ke halaman Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Menerima data balikan dari Google (Callback)
    // CATATAN: Blok try-catch DIBUANG SEMENTARA agar error asli muncul
    public function handleGoogleCallback()
    {
        // 1. Ambil data user dari Google
        // Jika ada masalah konfigurasi (Client ID/Secret salah), error akan muncul di baris ini
        $googleUser = Socialite::driver('google')->stateless()->user();

        // 2. Cari user di database berdasarkan google_id atau email
        $user = User::where('google_id', $googleUser->id)
                    ->orWhere('email', $googleUser->email)
                    ->first();

        if ($user) {
            // A. JIKA USER SUDAH ADA (Login)
            // Pastikan google_id tercatat (untuk user yang awalnya daftar manual)
            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->id]);
            }
            
            Auth::login($user);
            return redirect()->route('dashboard');
        
        } else {
            // B. JIKA USER BELUM ADA (Daftar & Login)
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make('password-acak-' . rand(1000,9999)), // Password dummy
                'avatar' => $googleUser->avatar, 
                'email_verified_at' => now(), 
            ]);

            Auth::login($newUser);
            return redirect()->route('dashboard');
        }
    }
}