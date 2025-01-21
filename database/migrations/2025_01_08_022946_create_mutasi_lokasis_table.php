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
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->id('id_mutasi_lokasi');
            $table->foreignId('id_lokasi')->constrained('tbl_lokasi', 'id_lokasi')->onDelete('cascade');
            $table->foreignId('id_pengadaan')->constrained('tbl_pengadaan', 'id_pengadaan')->onDelete('cascade');
            $table->string('flag_lokasi', 45)->nullable();
            $table->string('flag_pindah', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
};
