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
        Schema::table('mst_pendaftaran', function (Blueprint $table) {
            $table->string('file_ijazah', 255)->nullable()->after('other_file');
            $table->string('file_akte', 255)->nullable()->after('file_ijazah');
            $table->string('file_raport', 255)->nullable()->after('file_akte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_pendaftaran', function (Blueprint $table) {
            $table->dropColumn(['file_ijazah', 'file_akte', 'file_raport']);
        });
    }
};
