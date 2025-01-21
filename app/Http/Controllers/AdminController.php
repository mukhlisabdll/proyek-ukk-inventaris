<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Distributor;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\MutasiLokasi;
use App\Models\Opname;
use App\Models\HitungDepresiasi;
use App\Models\Depresiasi;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        $data = [
            'masterBarang' => MasterBarang::count(),
            'kategoriAsset' => KategoriAsset::count(),
            'subKategoriAsset' => SubKategoriAsset::count(),
            'merk' => Merk::count(),
            'satuan' => Satuan::count(),
            'distributor' => Distributor::count(),
            'lokasi' => Lokasi::count(),
            'pengadaan' => Pengadaan::count(),
            'mutasiLokasi' => MutasiLokasi::count(),
            'opname' => Opname::count(),
            'hitungDepresiasi' => HitungDepresiasi::count(),
            'depresiasi' => Depresiasi::count(),
            'akun' => User::count()
        ];

        return view('admin.dashboard', compact('data'));
    }
}
