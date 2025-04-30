<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    use HasFactory;

    protected $table = 'tbl_penyimpanan';

    protected $fillable = [
        'id_pengadaan',
        'id_opname',
        'id_lokasi',
        'nama_barang',
        'jumlah',
        'status',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan', 'id_pengadaan');
    }

    public function opname()
    {
        return $this->belongsTo(Opname::class, 'id_opname', 'id_opname');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }
}
