<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'tbl_satuan'; // Nama tabel
    protected $primaryKey = 'id_satuan'; // Primary key

    protected $fillable = [
        'satuan',
    ]; // Field yang dapat diisi
}
