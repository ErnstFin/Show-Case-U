<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/builder', function () {
    return view('builder');
})->name('builder');

Route::post('/resume/download', [App\Http\Controllers\ResumeController::class, 'downloadFromData'])->name('resume.download');
Route::post('/resume', [App\Http\Controllers\ResumeController::class, 'store'])->name('resume.store');
Route::put('/resume/{resume}', [App\Http\Controllers\ResumeController::class, 'update'])->name('resume.update');
Route::get('/resume/{resume}/download', [App\Http\Controllers\ResumeController::class, 'download'])->name('resume.download.id');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
