<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UjikomController;

// Landing page sekolah
Route::get('/', [LandingController::class, 'index'])
    ->name('landing');

// Halaman Ujikom
Route::get('/ujikom', [UjikomController::class, 'index'])
    ->name('ujikom');

// Proses hitung nilai
Route::post('/ujikom/hitung', [UjikomController::class, 'hitung'])
    ->name('ujikom.hitung');

// Halaman lainnya
Route::get('/profil', [LandingController::class, 'profil'])->name('profil');
Route::get('/guru', [LandingController::class, 'guru'])->name('guru');
Route::get('/program', [LandingController::class, 'program'])->name('program');
Route::get('/ekstrakulikuler', [LandingController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/berita', [LandingController::class, 'berita'])->name('berita');
Route::get('/prestasi', [LandingController::class, 'prestasi'])->name('prestasi');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('galeri');

