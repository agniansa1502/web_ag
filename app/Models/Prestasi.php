<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $primaryKey = 'id_prestasi';

    public $timestamps = false;

    protected $fillable = [
        'nama_prestasi',
        'kategori',
        'tingkat',
        'peraih',
        'deskripsi',
        'tanggal',
        'foto',
    ];
}
