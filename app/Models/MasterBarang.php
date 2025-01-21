<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_barang'; // Nama tabel
    protected $primaryKey = 'id_master_barang'; // Primary key

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ]; // Field yang dapat diisi
}
