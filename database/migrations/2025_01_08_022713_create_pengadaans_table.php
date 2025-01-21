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
        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->id('id_pengadaan');
            $table->foreignId('id_master_barang')->constrained('tbl_master_barang', 'id_master_barang')->onDelete('cascade');
            $table->foreignId('id_depresiasi')->constrained('tbl_depresiasi', 'id_depresiasi')->onDelete('cascade');
            $table->foreignId('id_merk')->constrained('tbl_merk', 'id_merk')->onDelete('cascade');
            $table->foreignId('id_satuan')->constrained('tbl_satuan', 'id_satuan')->onDelete('cascade');
            $table->foreignId('id_sub_kategori_asset')->constrained('tbl_sub_kategori_asset', 'id_sub_kategori_asset')->onDelete('cascade');
            $table->foreignId('id_distributor')->constrained('tbl_distributor', 'id_distributor')->onDelete('cascade');
            $table->string('kode_pengadaan', 20);
            $table->string('no_invoice', 20)->nullable();
            $table->string('no_seri_barang', 50);
            $table->string('tahun_produksi', 5);
            $table->date('tgl_pengadaan');
            $table->integer('harga_barang');
            $table->integer('nilai_barang');
            $table->enum('fb', ['0', '1']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengadaan');
    }
};
