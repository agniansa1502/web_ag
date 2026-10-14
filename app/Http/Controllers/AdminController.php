<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Galeri;

class AdminController extends Controller
{
    public function index()
    {
        // Mengirim data statistik sederhana ke halaman dashboard admin
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();

        return view('admin.dashboard', compact(
            'totalGuru',
            'totalSiswa',
            'totalBerita',
            'totalGaleri'
        ));
    }
}
