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
        Schema::create('tbl_opname', function (Blueprint $table) {
            $table->id('id_opname');
            $table->foreignId('id_pengadaan')->constrained('tbl_pengadaan', 'id_pengadaan')->onDelete('cascade');
            $table->date('tgl_opname');
            $table->string('kondisi_barang', 25);
            $table->string('keterangan', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_opname');
    }
};
