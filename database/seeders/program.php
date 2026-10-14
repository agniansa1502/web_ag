<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'nama_program' => 'Tahfidz Al-Qur\'an',
                'deskripsi' => 'Program unggulan hafalan Al-Qur\'an dengan target minimal 3 Juz.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_program' => 'Kajian Kitab Kuning',
                'deskripsi' => 'Pendalaman literatur Islam klasik untuk memperkuat pemahaman fiqih dan akhlak.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
