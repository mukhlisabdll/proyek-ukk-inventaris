<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengadaan'; // Nama tabel
    protected $primaryKey = 'id_pengadaan'; // Primary key

    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'jumlah_barang',
        'fb',
        'keterangan',
        'depresiasi_barang', // Kolom tambahan
    ];

    // Relasi ke model lain
    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang');
    }

    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    // Accessor untuk menghitung nilai_barang secara otomatis
    public function getNilaiBarangAttribute()
    {
        return $this->jumlah_barang * $this->harga_barang;
    }

    // Di dalam model Pengadaan
    public function hitungDepresiasiPerBulan()
    {
        // Pastikan harga_barang dan id_depresiasi (usia barang) ada
        if ($this->harga_barang && $this->depresiasi && $this->depresiasi->lama_depresiasi) {
            return $this->harga_barang / $this->depresiasi->lama_depresiasi;
        }
        return 0; // Jika data tidak lengkap, kembalikan 0
    }

    public function getDetailDepresiasi()
    {
        $detailDepresiasi = [];
        $depresiasiPerBulan = $this->hitungDepresiasiPerBulan();
        $nilaiAwal = $this->harga_barang;

        for ($i = 1; $i <= $this->depresiasi->lama_depresiasi; $i++) {
            $nilaiDepresiasi = $nilaiAwal - ($depresiasiPerBulan * $i);
            $detailDepresiasi[] = [
                'bulan' => $i,
                'nilai' => max($nilaiDepresiasi, 0), // Pastikan nilai tidak negatif
            ];
        }

        return $detailDepresiasi;
    }

    // Di dalam model Pengadaan
    protected static function boot()
    {
        parent::boot();

        // Hitung depresiasi_barang secara otomatis sebelum menyimpan data
        static::saving(function ($pengadaan) {
            if ($pengadaan->harga_barang && $pengadaan->depresiasi && $pengadaan->depresiasi->lama_depresiasi) {
                $pengadaan->depresiasi_barang = $pengadaan->harga_barang / $pengadaan->depresiasi->lama_depresiasi;
            } else {
                $pengadaan->depresiasi_barang = 0; // Jika data tidak lengkap, set ke 0
            }
        });
    }
}
