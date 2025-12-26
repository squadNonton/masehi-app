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
        Schema::create('trs_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('nisn', 20);
            $table->string('asal_sekolah');
            $table->string('telepon_ortu', 20);
            $table->string('email_ortu');
            $table->enum('jurusan', ['MIPA', 'IPS', 'Bahasa']);
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending', 'review', 'diterima', 'ditolak'])->default('pending');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trs_pendaftaran');
    }
};
