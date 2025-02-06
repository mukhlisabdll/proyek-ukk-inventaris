<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\HitungDepresiasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('dashboard');

// Routes untuk user
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'role:user'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes untuk kategori asset
Route::middleware(['auth', 'role:admin'])->get('admin/kategori-asset', [KategoriAssetController::class, 'index'])->name('kategori-asset.index');
Route::middleware(['auth', 'role:admin'])->get('admin/kategori-asset/create', [KategoriAssetController::class, 'create'])->name('kategori-asset.create');
Route::middleware(['auth', 'role:admin'])->get('admin/kategori-asset/{kategori_asset}/edit', [KategoriAssetController::class, 'edit'])->name('kategori-asset.edit');
Route::middleware(['auth', 'role:admin'])->delete('admin/kategori-asset/{kategori_asset}', [KategoriAssetController::class, 'destroy'])->name('kategori-asset.destroy');
Route::middleware(['auth', 'role:admin'])->put('admin/kategori-asset/{kategori_asset}', [KategoriAssetController::class, 'update'])->name('kategori-asset.update');
Route::middleware(['auth', 'role:admin'])->post('admin/kategori-asset', [KategoriAssetController::class, 'store'])->name('kategori-asset.store');

// Routes untuk sub kategori asset
Route::middleware(['auth', 'role:admin'])->get('admin/sub-kategori-asset', [SubKategoriAssetController::class, 'index'])->name('sub-kategori-asset.index');
Route::middleware(['auth', 'role:admin'])->get('admin/sub-kategori-asset/create', [SubKategoriAssetController::class, 'create'])->name('sub-kategori-asset.create');
Route::middleware(['auth', 'role:admin'])->post('admin/sub-kategori-asset', [SubKategoriAssetController::class, 'store'])->name('sub-kategori-asset.store');
Route::middleware(['auth', 'role:admin'])->get('admin/sub-kategori-asset/{sub_kategori_asset}/edit', [SubKategoriAssetController::class, 'edit'])->name('sub-kategori-asset.edit');
Route::middleware(['auth', 'role:admin'])->put('admin/sub-kategori-asset/{sub_kategori_asset}', [SubKategoriAssetController::class, 'update'])->name('sub-kategori-asset.update');
Route::middleware(['auth', 'role:admin'])->delete('admin/sub-kategori-asset/{sub_kategori_asset}', [SubKategoriAssetController::class, 'destroy'])->name('sub-kategori-asset.destroy');

// Routes untuk distributor
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/distributor', [DistributorController::class, 'index'])->name('distributor.index');
    Route::get('admin/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('admin/distributor', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('admin/distributor/{distributor}/edit', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::put('admin/distributor/{distributor}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('admin/distributor/{distributor}', [DistributorController::class, 'destroy'])->name('distributor.destroy');
});

// Routes untuk master barang
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/master-barang', [MasterBarangController::class, 'index'])->name('master-barang.index');
    Route::get('admin/master-barang/create', [MasterBarangController::class, 'create'])->name('master-barang.create');
    Route::post('admin/master-barang', [MasterBarangController::class, 'store'])->name('master-barang.store');
    Route::get('admin/master-barang/{masterBarang}/edit', [MasterBarangController::class, 'edit'])->name('master-barang.edit');
    Route::put('admin/master-barang/{masterBarang}', [MasterBarangController::class, 'update'])->name('master-barang.update');
    Route::delete('admin/master-barang/{masterBarang}', [MasterBarangController::class, 'destroy'])->name('master-barang.destroy');
});

// Routes untuk Merk
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/merk', [MerkController::class, 'index'])->name('merk.index');
    Route::get('admin/merk/create', [MerkController::class, 'create'])->name('merk.create');
    Route::post('admin/merk', [MerkController::class, 'store'])->name('merk.store');
    Route::get('admin/merk/{merk}/edit', [MerkController::class, 'edit'])->name('merk.edit');
    Route::put('admin/merk/{merk}', [MerkController::class, 'update'])->name('merk.update');
    Route::delete('admin/merk/{merk}', [MerkController::class, 'destroy'])->name('merk.destroy');
});

// Routes untuk Satuan
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('admin/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('admin/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('admin/satuan/{satuan}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('admin/satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('admin/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
});

// Routes untuk Lokasi
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('admin/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('admin/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('admin/lokasi/{lokasi}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::put('admin/lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('admin/lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
});

// Routes untuk Pengadaan
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
    Route::get('admin/pengadaan/create', [PengadaanController::class, 'create'])->name('pengadaan.create');
    Route::get('admin/pengadaan/{id}/depresiasi', [PengadaanController::class, 'showDepresiasi'])->name('pengadaan.depresiasi');
    Route::post('admin/pengadaan', [PengadaanController::class, 'store'])->name('pengadaan.store');
    Route::get('admin/pengadaan/{pengadaan}/edit', [PengadaanController::class, 'edit'])->name('pengadaan.edit');
    Route::put('admin/pengadaan/{pengadaan}', [PengadaanController::class, 'update'])->name('pengadaan.update');
    Route::delete('admin/pengadaan/{pengadaan}', [PengadaanController::class, 'destroy'])->name('pengadaan.destroy');

});

// Routes untuk Depresiasi
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/depresiasi', [DepresiasiController::class, 'index'])->name('depresiasi.index');
    Route::get('admin/depresiasi/create', [DepresiasiController::class, 'create'])->name('depresiasi.create');
    Route::post('admin/depresiasi', [DepresiasiController::class, 'store'])->name('depresiasi.store');
    Route::get('admin/depresiasi/{depresiasi}/edit', [DepresiasiController::class, 'edit'])->name('depresiasi.edit');
    Route::put('admin/depresiasi/{depresiasi}', [DepresiasiController::class, 'update'])->name('depresiasi.update');
    Route::delete('admin/depresiasi/{depresiasi}', [DepresiasiController::class, 'destroy'])->name('depresiasi.destroy');
});

// Routes untuk Mutasi Lokasi
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/mutasi-lokasi', [MutasiLokasiController::class, 'index'])->name('mutasi-lokasi.index');
    Route::get('admin/mutasi-lokasi/create', [MutasiLokasiController::class, 'create'])->name('mutasi-lokasi.create');
    Route::post('admin/mutasi-lokasi', [MutasiLokasiController::class, 'store'])->name('mutasi-lokasi.store');
    Route::get('admin/mutasi-lokasi/{mutasiLokasi}/edit', [MutasiLokasiController::class, 'edit'])->name('mutasi-lokasi.edit');
    Route::put('admin/mutasi-lokasi/{mutasiLokasi}', [MutasiLokasiController::class, 'update'])->name('mutasi-lokasi.update');
    Route::delete('admin/mutasi-lokasi/{mutasiLokasi}', [MutasiLokasiController::class, 'destroy'])->name('mutasi-lokasi.destroy');
});

// Routes untuk Opname
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('opname', OpnameController::class);
});

// Routes untuk Hitung Depresiasi
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('hitung-depresiasi', HitungDepresiasiController::class);
});

// Routes untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Routes untuk pengadaan (user access)
    Route::get('user/pengadaan', [PengadaanController::class, 'userIndex'])->name('user.pengadaan.index');
    Route::get('user/pengadaan/create', [PengadaanController::class, 'userCreate'])->name('user.pengadaan.create');
    Route::post('user/pengadaan', [PengadaanController::class, 'userStore'])->name('user.pengadaan.store');
    Route::get('user/pengadaan/{pengadaan}/edit', [PengadaanController::class, 'userEdit'])->name('user.pengadaan.edit');
    Route::put('user/pengadaan/{pengadaan}', [PengadaanController::class, 'userUpdate'])->name('user.pengadaan.update');
    Route::delete('user/pengadaan/{pengadaan}', [PengadaanController::class, 'userDestroy'])->name('user.pengadaan.destroy');
    Route::get('user/pengadaan/{id}/detail-depresiasi', [PengadaanController::class, 'userShowDepresiasi'])->name('user.pengadaan.detail_depresiasi');


    // Routes untuk opname (user access)
    Route::get('user/opname', [OpnameController::class, 'userIndex'])->name('user.opname.index');
    Route::get('user/opname/create', [OpnameController::class, 'userCreate'])->name('user.opname.create');
    Route::post('user/opname', [OpnameController::class, 'userStore'])->name('user.opname.store');

    // Routes untuk hitung depresiasi (user access)
    Route::get('user/hitung-depresiasi', [HitungDepresiasiController::class, 'userIndex'])->name('user.hitung-depresiasi.index');
    Route::get('user/hitung-depresiasi/create', [HitungDepresiasiController::class, 'userCreate'])->name('user.hitung-depresiasi.create');
    Route::post('user/hitung-depresiasi', [HitungDepresiasiController::class, 'userStore'])->name('user.hitung-depresiasi.store');
    Route::get('user/hitung-depresiasi/{hitungDepresiasi}', [HitungDepresiasiController::class, 'userShow'])->name('user.hitung-depresiasi.show');
    Route::get('user/hitung-depresiasi/{hitungDepresiasi}/edit', [HitungDepresiasiController::class, 'userEdit'])->name('user.hitung-depresiasi.edit');
    Route::put('user/hitung-depresiasi/{hitungDepresiasi}', [HitungDepresiasiController::class, 'userUpdate'])->name('user.hitung-depresiasi.update');
});

require __DIR__.'/auth.php';
