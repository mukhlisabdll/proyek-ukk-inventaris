<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_depresiasi';
    protected $primaryKey = 'id_depresiasi';

    protected $fillable = [
        'lama_depresiasi',
        'keterangan',
    ];
}
