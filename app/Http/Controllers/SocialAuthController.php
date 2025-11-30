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

    // 2. Menerima data balikan dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user: apakah ID Google-nya sama? ATAU email-nya sama?
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // A. JIKA USER SUDAH ADA
                // Update google_id jika belum punya (misal dulu daftar manual)
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
                
                // Login & masuk dashboard
                Auth::login($user);
                return redirect()->route('dashboard');
            
            } else {
                // B. JIKA USER BELUM ADA (BARU)
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make('password-acak-' . rand(1000,9999)), // Password dummy
                    'avatar' => $googleUser->avatar, // Pakai foto dari Google
                    'email_verified_at' => now(), // Anggap email valid
                ]);

                Auth::login($newUser);
                return redirect()->route('dashboard');
            }

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Gagal login dengan Google.']);
        }
    }
}