<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice'; // Nama tabel
    protected $primaryKey = 'id_invoice'; // Primary key

    protected $fillable = [
        'id_pengadaan', // Foreign key ke tabel pengadaan
        'no_invoice',   // Nomor invoice
        'jumlah_barang', // Jumlah barang
        'tgl_invoice',   // Tanggal invoice
    ];

    // Relasi ke model Pengadaan
    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}