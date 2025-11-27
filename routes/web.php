<?php

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