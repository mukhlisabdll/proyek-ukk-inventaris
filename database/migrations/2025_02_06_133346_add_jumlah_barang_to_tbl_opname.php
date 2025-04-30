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
        Schema::table('tbl_opname', function (Blueprint $table) {
            $table->integer('jumlah_barang')->after('kondisi_barang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_opname', function (Blueprint $table) {
            $table->dropColumn('jumlah_barang');
        });
    }
};
