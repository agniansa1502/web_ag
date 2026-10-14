<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BeritaSeeder::class,
            // EkstrakulikullerSeeder::class, // Komentari
            // Galeriseeder::class,          // Komentari juga biar gak error kolom foto
        ]);
        User::create([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 'admin', // Sesuaikan jika ada kolom role di tabelmu
        ]);
    }
}
