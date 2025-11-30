<?php

<<<<<<< HEAD
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/builder', function () {
    return view('builder');
})->name('builder');

// PERBAIKAN: Mengubah nama rute menjadi 'resume.download-data'
Route::post('/resume/download', [App\Http\Controllers\ResumeController::class, 'downloadFromData'])->name('resume.download-data'); 

Route::post('/resume', [App\Http\Controllers\ResumeController::class, 'store'])->name('resume.store');
Route::put('/resume/{resume}', [App\Http\Controllers\ResumeController::class, 'update'])->name('resume.update');
Route::get('/resume/{resume}/download', [App\Http\Controllers\ResumeController::class, 'download'])->name('resume.download.id');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/files/{fileEntry}', [HomeController::class, 'download'])->name('home.files.download');
    Route::delete('/home/files/{fileEntry}', [HomeController::class, 'destroy'])->name('home.files.destroy');
    Route::delete('/home/files', [HomeController::class, 'destroyAll'])->name('home.files.destroyAll');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('dashboard.admin');
});

require __DIR__.'/auth.php';
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
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
>>>>>>> origin/Jojo
