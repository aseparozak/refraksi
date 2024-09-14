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
        Schema::table('ukurans', function (Blueprint $table) {
            Schema::table('ukurans', function (Blueprint $table) {
                $table->string('keluhan')->after('patient_id'); // Menambahkan kolom keluhan
                $table->string('riwayat_penyakit')->after('keluhan'); // Menambahkan kolom riwayat_penyakit
                $table->string('ukuran_kacamata_lama')->after('riwayat_penyakit'); // Menambahkan kolom ukuran_kacamata_lama
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ukurans', function (Blueprint $table) {
            //
        });
    }
};
