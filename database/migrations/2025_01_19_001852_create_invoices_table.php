<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_invoices', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->foreignId('id_pengadaan')->constrained('tbl_pengadaan', 'id_pengadaan')->onDelete('cascade');
            $table->string('no_invoice');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_invoices');
    }
}
