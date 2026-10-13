<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->increments('id_prestasi');
            $table->string('nama_prestasi', 100);
            $table->string('kategori', 50);
            $table->string('tingkat', 50)->nullable();
            $table->string('peraih', 100);
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('foto', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
