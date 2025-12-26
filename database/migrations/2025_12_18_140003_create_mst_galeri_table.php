<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mst_galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('tipe', ['foto', 'video'])->default('foto');
            $table->string('file_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('kategori'); // kegiatan, fasilitas, prestasi, wisuda
            $table->string('album')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mst_galeri');
    }
};
