<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    // Halaman utama
    public function index()
    {
        $profil = DB::table('profil_sekolah')->first();
        $guru = DB::table('guru')->get();
        $berita = DB::table('berita')
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();
        $galeri = DB::table('galeri')
            ->orderBy('tanggal', 'desc')
            ->limit(6)
            ->get();
        $prestasi = DB::table('prestasi')
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        return view('landing', compact(
            'profil',
            'guru',
            'berita',
            'galeri',
            'prestasi'
        ));
    }

    // Halaman profil sekolah
    public function profil()
    {
        $profil = DB::table('profil_sekolah')->first();

        return view('profil', compact('profil'));
    }

    // Halaman guru
    public function guru()
    {
        $guru = DB::table('guru')->get();

        return view('guru', compact('guru'));
    }

    // Halaman program sekolah
    public function program()
    {
        // Program masih berupa informasi statis karena
        // tabel program belum ada pada struktur database.
        return view('program');
    }

    // Halaman ekstrakulikuler
    public function ekstrakurikuler()
    {
        $ekstrakurikuler = DB::table('ekstrakurikuler')->get();

        return view(
            'ekstrakurikuler',
            compact('ekstrakurikuler')
        );
    }

    // Halaman berita
    public function berita()
    {
        $berita = DB::table('berita')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('berita', compact('berita'));
    }

    // Halaman prestasi
    public function prestasi()
    {
        $prestasi = DB::table('prestasi')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('prestasi', compact('prestasi'));
    }

    // Halaman galeri
    public function galeri()
    {
        $galeri = DB::table('galeri')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('galeri', compact('galeri'));
    }
}
