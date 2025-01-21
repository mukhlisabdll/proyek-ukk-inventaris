<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_kategori_asset';

    // Primary key
    protected $primaryKey = 'id_kategori_asset';

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];

    // Jika tidak ingin menggunakan kolom `created_at` dan `updated_at`
    public $timestamps = true;
}
