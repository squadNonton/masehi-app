<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mst_prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('tingkat'); // kota, provinsi, nasional, internasional
            $table->string('kategori'); // akademik, olahraga, seni, robotik
            $table->string('peringkat'); // juara 1, 2, 3, harapan
            $table->string('nama_peserta')->nullable();
            $table->year('tahun');
            $table->date('tanggal')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mst_prestasi');
    }
};
