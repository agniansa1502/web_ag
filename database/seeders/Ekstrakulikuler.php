<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakulikuler; // Perhatikan ejaannya

class EkstrakulrikulerSeeder extends Seeder
{
    public function run(): void
    {
        Ekstrakulikuler::create([
            'nama' => 'Pramuka Penggalang',
            'pembina' => 'Ahmad Fauzi, S.Pd.',
            'jadwal' => 'Setiap Hari Jumat (14.00 WIB)',
            'deskripsi' => 'Kegiatan kepramukaan untuk melatih kedisiplinan dan kemandirian siswa.',
            'gambar' => null,
        ]);
    }
}
