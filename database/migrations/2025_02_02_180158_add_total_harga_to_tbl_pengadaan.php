<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalHargaToTblPengadaan extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_pengadaan', function (Blueprint $table) {
            $table->decimal('total_harga', 15, 2)->default(0)->after('jumlah_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_pengadaan', function (Blueprint $table) {
            $table->dropColumn('total_harga');
        });
    }
};
