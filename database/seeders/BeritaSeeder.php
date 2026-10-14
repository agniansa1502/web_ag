<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Berita::create([
            'judul' => 'Penerimaan Peserta Didik Baru (PPDB) T.A 2026/2027 Resmi Dibuka',
            'kategori' => 'Pengumuman',
            'ringkasan' => 'MTs Al Muawanah resmi membuka pendaftaran santri baru untuk tahun ajaran 2026/2027.',
            'konten' => 'MTs Al Muawanah Tasikmalaya resmi membuka penerimaan peserta didik baru (PPDB) tahun ajaran 2026/2027. Pendaftaran dapat dilakukan secara langsung di sekretariat madrasah atau melalui fasilitas pendaftaran online.',
            'gambar' => null,
        ]);
    }
}
