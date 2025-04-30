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
        Schema::create('tbl_penyimpanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengadaan');
            $table->unsignedBigInteger('id_opname');
            $table->unsignedBigInteger('id_lokasi');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->enum('status', ['baik', 'rusak', 'hilang']);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_pengadaan')
                ->references('id_pengadaan')
                ->on('tbl_pengadaan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_opname')
                ->references('id_opname')
                ->on('tbl_opname')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_lokasi')
                ->references('id_lokasi')
                ->on('tbl_lokasi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_penyimpanan');
    }
};
