<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pengadaans = Pengadaan::when($search, function ($query, $search) {
            return $query->where('kode_pengadaan', 'like', "%{$search}%")
                         ->orWhere('no_invoice', 'like', "%{$search}%")
                         ->orWhere('tgl_pengadaan', 'like', "%{$search}%");
        })->with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'])->get();

        return view('admin.pengadaan.index', compact('pengadaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();
        return view('admin.pengadaan.create', compact('masterBarangs', 'depresiasis', 'merks', 'satuans', 'subKategoriAssets', 'distributors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_master_barang' => 'required|exists:tbl_master_barang,id_master_barang',
            'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|max:20|unique:tbl_pengadaan,kode_pengadaan',
            'no_invoice' => 'nullable|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|size:4',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
        ]);

        Pengadaan::create($request->all());

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.edit', compact('pengadaan', 'masterBarangs', 'depresiasis', 'merks', 'satuans', 'subKategoriAssets', 'distributors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        $request->validate([
            'kode_pengadaan' => 'required|max:20|unique:tbl_pengadaan,kode_pengadaan,' . $pengadaan->id_pengadaan . ',id_pengadaan',
            'no_invoice' => 'nullable|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|size:4',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
        ]);

        $pengadaan->update($request->all());

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengadaan $pengadaan)
    {
        $pengadaan->delete();

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }

    /**
     * Tampilkan semua data pengadaan untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        $data = Pengadaan::when($search, function ($query, $search) {
            return $query->where('kode_pengadaan', 'like', "%{$search}%")
                         ->orWhere('no_invoice', 'like', "%{$search}%")
                         ->orWhere('tgl_pengadaan', 'like', "%{$search}%");
        })->with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'])->get();

        return view('user.pengadaan.index', compact('data'));
    }

    /**
     * Tampilkan form tambah pengadaan untuk user.
     */
    public function userCreate()
    {
        $masterBarangs = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subKategoriAssets = SubKategoriAsset::all();
        $distributors = Distributor::all();
        return view('user.pengadaan.create', compact('masterBarangs', 'depresiasis', 'merks', 'satuans', 'subKategoriAssets', 'distributors'));
    }

    /**
     * Simpan data pengadaan baru untuk user.
     */
    public function userStore(Request $request)
    {
        $request->validate([
            'id_master_barang' => 'required|exists:tbl_master_barang,id_master_barang',
            'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|max:20|unique:tbl_pengadaan,kode_pengadaan',
            'no_invoice' => 'nullable|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|size:4',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
        ]);

        Pengadaan::create($request->all());

        return redirect()->route('user.pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
    }

}
