<?php

// database/migrations/xxxx_xx_xx_create_invoice_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id_invoice'); // Primary key
            $table->foreignId('id_pengadaan')->constrained('tbl_pengadaan')->onDelete('cascade'); // Foreign key ke tabel pengadaan
            $table->string('no_invoice', 20); // No. Invoice
            $table->integer('jumlah_barang'); // Jumlah barang
            $table->date('tgl_invoice'); // Tanggal invoice
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('invoice'); // Hapus tabel jika migration di-rollback
    }
}
