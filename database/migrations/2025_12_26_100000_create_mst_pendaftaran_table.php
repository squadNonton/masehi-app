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
        Schema::create('mst_pendaftaran', function (Blueprint $table) {
            // ID & SYSTEM
            $table->id();
            
            // TAHAP 1: PENDAFTARAN AWAL
            $table->string('email_akun', 100);
            $table->string('nama_lengkap', 150);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');

            // TAHAP 2: DATA LENGKAP (Awalnya boleh NULL, diupdate di halaman kedua)
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('agama', 50)->nullable();

            // ALAMAT SISWA
            $table->text('alamat_siswa')->nullable();
            $table->string('desa_siswa', 100)->nullable();
            $table->string('kec_siswa', 100)->nullable();
            $table->string('kab_siswa', 100)->nullable();
            $table->string('prov_siswa', 100)->nullable();

            // KONTAK & SEKOLAH
            $table->string('no_hp_siswa', 20)->nullable();
            $table->string('email_siswa', 100)->nullable();
            $table->string('sekolah_asal_smp', 150)->nullable();
            $table->string('nisn', 30)->nullable();

            // DATA SAUDARA
            $table->enum('punya_saudara_masehi', ['YA', 'TIDAK'])->nullable();
            $table->string('nama_saudara', 150)->nullable();
            $table->string('kelas_saudara', 50)->nullable();
            $table->string('unit_saudara', 100)->nullable();

            // DATA AYAH
            $table->string('nama_ayah', 150)->nullable();
            $table->string('tempat_lahir_ayah', 100)->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('no_hp_ayah', 20)->nullable();
            $table->string('pekerjaan_ayah', 100)->nullable();
            $table->string('penghasilan_ayah', 100)->nullable();

            // DATA IBU
            $table->string('nama_ibu', 150)->nullable();
            $table->string('tempat_lahir_ibu', 100)->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('no_hp_ibu', 20)->nullable();
            $table->string('pekerjaan_ibu', 100)->nullable();
            $table->string('penghasilan_ibu', 100)->nullable();

            // ALAMAT ORTU
            $table->text('alamat_ortu')->nullable();
            $table->string('desa_ortu', 100)->nullable();
            $table->string('kec_ortu', 100)->nullable();
            $table->string('kab_ortu', 100)->nullable();
            $table->string('prov_ortu', 100)->nullable();

            // DATA TAMBAHAN ORTU
            $table->enum('ortu_karyawan_masehi', ['YA', 'TIDAK'])->nullable();
            $table->string('bagian_karyawan_masehi', 100)->nullable();
            $table->enum('ortu_alumni_masehi', ['YA', 'TIDAK'])->nullable();
            $table->string('unit_alumni_ortu', 100)->nullable();
            $table->string('tahun_lulus_ortu', 20)->nullable();
            $table->enum('ortu_jemaat_gkmi', ['YA', 'TIDAK'])->nullable();
            $table->string('nomor_anggota_gereja', 50)->nullable();

            // DATA WALI
            $table->string('nama_wali', 150)->nullable();
            $table->string('tempat_lahir_wali', 100)->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('no_hp_wali', 20)->nullable();
            $table->string('pekerjaan_wali', 100)->nullable();
            $table->string('penghasilan_wali', 100)->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string('desa_wali', 100)->nullable();
            $table->string('kec_wali', 100)->nullable();
            $table->string('kab_wali', 100)->nullable();
            $table->string('prov_wali', 100)->nullable();

            // FILES
            $table->string('file_foto_siswa', 255)->nullable();
            $table->string('other_file', 255)->nullable();

            // SYSTEM COLS (AT THE END)
            $table->boolean('is_active')->default(true)->comment('1=Aktif, 0=Nonaktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_pendaftaran');
    }
};
