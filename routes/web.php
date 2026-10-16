<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiController;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use App\Models\Galeri;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('landing.index');

Route::get('/profil', function () {
    return view('landing.profil');
})->name('landing.profil');

Route::get('/visi-misi', function () {
    return view('landing.visi-misi');
})->name('landing.visi-misi');

Route::get('/kontak', function () {
    return view('landing.kontak');
})->name('landing.kontak');

/*
|--------------------------------------------------------------------------
| GURU PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/guru-staf', function () {
    return view('landing.guru.guru-staf', [
        'gurus' => Guru::all()
    ]);
})->name('landing.guru-staf');

Route::get('/detail-guru/{id}', [HomeController::class, 'showGuru'])
    ->name('landing.guru.show');

/*
|--------------------------------------------------------------------------
| EKSTRAKURIKULER PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/ekstrakulikuler-sekolah', function () {
    return view('landing.ekstrakulikuler.ekstrakulikuler-sekolah', [
        'ekstrakulikuler' => Ekstrakulikuler::all()
    ]);
})->name('landing.ekskul');

Route::get('/detail-ekstrakulikuler/{id}', [HomeController::class, 'showEkskul'])
    ->name('landing.ekskul.show');

/*
|--------------------------------------------------------------------------
| BERITA PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/berita-sekolah', function () {
    return view('landing.berita.berita', [
        'berita' => Berita::where('status', 'publis')
            ->latest()
            ->get()
    ]);
})->name('landing.berita');

Route::get('/detail-berita/{id}', [HomeController::class, 'showBerita'])
    ->name('landing.berita.show');

/*
|--------------------------------------------------------------------------
| GALERI PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/galeri-sekolah', function () {
    return view('landing.galeri.galeri', [
        'galeri' => Galeri::latest()->get()
    ]);
})->name('landing.galeri');

Route::get('/detail-galeri/{id}', [HomeController::class, 'showGaleri'])
    ->name('landing.galeri.show');

/*
|--------------------------------------------------------------------------
| INPUT NILAI
|--------------------------------------------------------------------------
*/

Route::get('/nilai', [NilaiController::class, 'index'])
    ->name('landing.nilai');

Route::post('/nilai/hitung', [NilaiController::class, 'hitung'])
    ->name('landing.nilai.hitung');

/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('auth.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

/*
|--------------------------------------------------------------------------
| HALAMAN ADMIN - HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /*
    | PROFIL SEKOLAH ADMIN
    */

    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])
        ->name('profil.index');

    Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])
        ->name('profil.edit');

    Route::put('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])
        ->name('profil.update');

    /*
    | CRUD ADMIN
    */

    Route::resource('siswa', SiswaController::class);

    Route::resource('guru', GuruController::class);

    Route::resource('ekstrakulikuler', EkstrakulikulerController::class);

    Route::resource('berita', BeritaController::class);

    Route::resource('galeri', GaleriController::class);

    Route::resource('user', UserController::class)
        ->middleware('checkauth');
});