<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuller extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikullers';
    protected $fillable = ['nama', 'pembina', 'jadwal', 'deskripsi', 'gambar'];
}
