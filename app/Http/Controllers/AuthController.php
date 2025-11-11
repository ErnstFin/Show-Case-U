<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menangani permintaan pendaftaran pengguna baru (API Register/Sign In).
     * Endpoint: POST /api/auth/register
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users', 
                'password' => 'required|string|min:8|confirmed', // memerlukan password_confirmation
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Input tidak valid.',
                'errors' => $e->errors()
            ], 422);
        }

        // 2. Buat Pengguna Baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-hash
        ]);

        // 3. Buat Token Sanctum untuk sesi baru
        $token = $user->createToken('Mobile-Token')->plainTextToken;

        // 4. Kembalikan Respons Sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Registrasi berhasil. Pengguna telah login.',
            'data' => [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
            ]
        ], 201); // 201 Created
    }

    /**
     * Menangani permintaan otentikasi (API Login).
     * Endpoint: POST /api/auth/login
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Input tidak valid.',
                'errors' => $e->errors()
            ], 422);
        }

        // 2. Mencoba Otentikasi Kredensial
        if (Auth::attempt($request->only('email', 'password'))) {
            // Otentikasi BERHASIL.
            
            $user = $request->user(); 
            
            // 3. Buat Token Sanctum
            $token = $user->createToken('Mobile-Token')->plainTextToken;

            // 4. Kembalikan Respons Sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Login berhasil.',
                'data' => [
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer',
                ]
            ]);

        } else {
            // Otentikasi GAGAL (Email atau Password salah)
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau Password salah.'
            ], 401);
        }
    }

    /**
     * Menangani permintaan Logout (mencabut token sesi).
     * Endpoint: POST /api/auth/logout (Memerlukan Token)
     */
    public function logout(Request $request)
    {
        // Pastikan pengguna sudah terotentikasi (menggunakan middleware 'auth:sanctum')
        
        if ($request->user()) {
            // Mencabut token yang sedang digunakan saat ini
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil. Sesi telah diakhiri.'
        ]);
    }
}