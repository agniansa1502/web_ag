<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;

class LandingController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        $guru = Guru::latest()->take(4)->get();

        $berita = Berita::latest()->take(3)->get();

        $galeri = Galeri::latest()->take(6)->get();

        $prestasi = Prestasi::latest()->take(4)->get();

        $ekstrakurikuler = Ekstrakurikuler::latest()
            ->take(4)
            ->get();

        return view('landing.index', compact(
            'profil',
            'guru',
            'berita',
            'galeri',
            'prestasi',
            'ekstrakurikuler'
        ));
    }
}
