<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mst_karya', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('file')->nullable();
            $table->string('kategori'); // tulisan, seni, project, video
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->year('tahun');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mst_karya');
    }
};
