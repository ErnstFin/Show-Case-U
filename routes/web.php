<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\SubscriptionController; // <--- INI YG BARU DITAMBAH

// --- 1. HALAMAN PUBLIK ---
Route::get('/', function () {
    return view('landing');
})->name('landing');

// --- 2. AUTH (Tamu) ---
Route::middleware('guest')->group(function () {
    // Rute Login Biasa (Tetap pakai AuthController)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    // Rute Login Google (Pakai SocialAuthController)
    Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- 3. MEMBER AREA (Wajib Login) ---
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [PortfolioController::class, 'index'])->name('dashboard');

    // Portfolio CRUD
    Route::get('/unggah', [PortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('/unggah', [PortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('/portfolios/{id}', [PortfolioController::class, 'show'])->name('portfolios.show');
    Route::get('/portfolios/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('/portfolios/{id}', [PortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('/portfolios/{id}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');

    // Akun
    Route::get('/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/akun', [ProfileController::class, 'update'])->name('profile.update');

    // CV Generator
    Route::get('/buat-cv', [CvController::class, 'create'])->name('cv.create');
    Route::post('/buat-cv', [CvController::class, 'store'])->name('cv.store');
    Route::get('/download-cv', [CvController::class, 'download'])->name('cv.download');

    // Langganan (INI YANG BIKIN ERROR TADI)
    Route::get('/langganan', [SubscriptionController::class, 'index'])->name('subscription.index');
});