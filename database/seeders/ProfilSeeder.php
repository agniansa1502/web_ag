<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profil_sekolah')->insert([
            'nama_sekolah' => 'MTs Al Muawanah',
            'tentang' => 'MTs Al Muawanah merupakan lembaga pendidikan tingkat Madrasah Tsanawiyah yang berkomitmen memberikan pendidikan terbaik bagi generasi muda.',
            'visi' => 'Terwujudnya generasi yang berilmu, berakhlak mulia, mandiri, dan berprestasi.',
            'misi' => "1. Menyediakan pendidikan berkualitas dan berkarakter.\n2. Menanamkan nilai-nilai Islam dalam kehidupan sehari-hari.\n3. Mengembangkan potensi dan bakat peserta didik.",
            'jumlah_siswa' => 130,
            'jumlah_guru' => 28,
            'jumlah_rombel' => 12,
            'jumlah_lembaga' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}