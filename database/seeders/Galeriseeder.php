<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\galeri;

class Galeriseeder extends Seeder
{
    public function run(): void
    {
        galeri::create([
            'judul' => 'Upacara Bendera Senin Pagi',
            'kategori' => 'Kegiatan Rutin',
            'foto' => null,
        ]);

        galeri::create([
            'judul' => 'Kegiatan Pengajian Rutin Santri',
            'kategori' => 'Keagamaan',
            'foto' => null,
        ]);
    }
}