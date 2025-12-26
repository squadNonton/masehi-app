<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mst_karir', function (Blueprint $table) {
            $table->id();
            $table->string('judul_posisi');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->text('benefit')->nullable();
            $table->string('tipe'); // guru, staff, admin
            $table->date('batas_lamaran');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mst_karir');
    }
};
