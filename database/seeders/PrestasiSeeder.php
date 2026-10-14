<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prestasis')->insert([
            [
                'judul' => 'Juara 1 Lomba Musabaqah Tilawatil Quran (MTQ)',
                'tingkat' => 'Kabupaten Tasikmalaya',
                'tahun' => '2025',
                'deskripsi' => 'Diraih oleh santri MTs Al Muawanah dalam ajang tahunan antar-madrasah.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}