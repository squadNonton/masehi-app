<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mst_carousel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('subjudul')->nullable();
            $table->string('gambar');
            $table->string('teks_tombol_1', 100)->nullable();
            $table->string('link_tombol_1')->nullable();
            $table->string('teks_tombol_2', 100)->nullable();
            $table->string('link_tombol_2')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_carousel');
    }
};
