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
                         ->orWhere('no_seri_barang', 'like', "%{$search}%")
                         ->orWhere('tgl_pengadaan', 'like', "%{$search}%")
                         ->orWhere('no_invoice', 'like', "%{$search}%");
        })->with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor', 'invoices'])->get();

        return view('admin.pengadaan.index', compact('pengadaans'));
    }

    /**
     * Tampilkan data pengadaan untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        $data = Pengadaan::when($search, function ($query, $search) {
            return $query->where('kode_pengadaan', 'like', "%{$search}%")
                         ->orWhere('no_invoice', 'like', "%{$search}%")
                         ->orWhere('tgl_pengadaan', 'like', "%{$search}%")
                         ->orWhere('no_invoice', 'like', "%{$search}%");
        })->with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor', 'invoices'])->get();

        return view('user.pengadaan.index', compact('data'));
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pengadaan $pengadaan)
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
            'jumlah_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
            'invoices' => 'required|array', // Array invoice
            'invoices.*.no_invoice' => 'required|max:20',
            'invoices.*.jumlah_barang' => 'required|integer',
            'invoices.*.tgl_invoice' => 'required|date',
        ], messages: [
            'id_master_barang.required' => 'Pilih Master Barang',
            'id_depresiasi.required' => 'Pilih Depresiasi',
            'id_merk.required' => 'Pilih Merk',
            'id_satuan.required' => 'Pilih Satuan',
            'id_sub_kategori_asset.required' => 'Pilih Sub Kategori Asset',
            'id_distributor.required' => 'Pilih Distributor',
            'kode_pengadaan.required' => 'Masukkan Kode Pengadaan',
            'kode_pengadaan.max' => 'Kode Pengadaan maksimal 20 karakter',
            'kode_pengadaan.unique' => 'Kode pengadaan sudah ada',
            'no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'no_seri_barang.required' => 'Masukkan No. Seri Barang',
            'no_seri_barang.max' => 'No. Seri Barang maksimal 50 karakter',
            'tahun_produksi.required' => 'Masukkan Tahun Produksi',
            'tahun_produksi.size' => 'Tahun Produksi harus 4 digit',
            'tgl_pengadaan.required' => 'Masukkan Tanggal Pengadaan',
            'tgl_pengadaan.date' => 'Tanggal Pengadaan harus dalam format tanggal',
            'harga_barang.required' => 'Masukkan Harga Barang',
            'harga_barang.integer' => 'Harga Barang harus berupa angka',
            'jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'nilai_barang.required' => 'Masukkan Nilai Barang',
            'nilai_barang.integer' => 'Nilai Barang harus berupa angka',
            'fb.required' => 'Pilih Fisik Barang',
            'keterangan.max' => 'Keterangan maksimal 50 karakter',
            'invoices.*.no_invoice.required' => 'Masukkan No. Invoice',
            'invoices.*.no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'invoices.*.jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'invoices.*.jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'invoices.*.tgl_invoice.required' => 'Masukkan Tanggal Invoice',
            'invoices.*.tgl_invoice.date' => 'Tanggal Invoice harus dalam format tanggal',
        ]);

        // Simpan data pengadaan
        $data = $request->except('invoices');
        $data['total_harga'] = $data['jumlah_barang'] * $data['harga_barang']; // Hitung ulang otomatis
        $pengadaan = Pengadaan::create($data);

        // Simpan data invoice
        foreach ($request->invoices as $invoiceData) {
            $pengadaan->invoices()->create($invoiceData);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
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
            'jumlah_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
            'invoices' => 'required|array', // Array invoice
            'invoices.*.no_invoice' => 'required|max:20',
            'invoices.*.jumlah_barang' => 'required|integer',
            'invoices.*.tgl_invoice' => 'required|date',
        ], messages: [
            'id_master_barang.required' => 'Pilih Master Barang',
            'id_depresiasi.required' => 'Pilih Depresiasi',
            'id_merk.required' => 'Pilih Merk',
            'id_satuan.required' => 'Pilih Satuan',
            'id_sub_kategori_asset.required' => 'Pilih Sub Kategori Asset',
            'id_distributor.required' => 'Pilih Distributor',
            'kode_pengadaan.required' => 'Masukkan Kode Pengadaan',
            'kode_pengadaan.max' => 'Kode Pengadaan maksimal 20 karakter',
            'kode_pengadaan.unique' => 'Kode pengadaan sudah ada',
            'no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'no_seri_barang.required' => 'Masukkan No. Seri Barang',
            'no_seri_barang.max' => 'No. Seri Barang maksimal 50 karakter',
            'tahun_produksi.required' => 'Masukkan Tahun Produksi',
            'tahun_produksi.size' => 'Tahun Produksi harus 4 digit',
            'tgl_pengadaan.required' => 'Masukkan Tanggal Pengadaan',
            'tgl_pengadaan.date' => 'Tanggal Pengadaan harus dalam format tanggal',
            'harga_barang.required' => 'Masukkan Harga Barang',
            'harga_barang.integer' => 'Harga Barang harus berupa angka',
            'jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'nilai_barang.required' => 'Masukkan Nilai Barang',
            'nilai_barang.integer' => 'Nilai Barang harus berupa angka',
            'fb.required' => 'Pilih Fisik Barang',
            'keterangan.max' => 'Keterangan maksimal 50 karakter',
            'invoices.*.no_invoice.required' => 'Masukkan No. Invoice',
            'invoices.*.no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'invoices.*.jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'invoices.*.jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'invoices.*.tgl_invoice.required' => 'Masukkan Tanggal Invoice',
            'invoices.*.tgl_invoice.date' => 'Tanggal Invoice harus dalam format tanggal',
        ]);

        // Simpan data pengadaan
        $data = $request->except('invoices');
        $data['total_harga'] = $data['jumlah_barang'] * $data['harga_barang']; // Hitung ulang otomatis
        $pengadaan = Pengadaan::create($data);

        // Simpan data invoice
        foreach ($request->invoices as $invoiceData) {
            $pengadaan->invoices()->create($invoiceData);
        }

        return redirect()->route('user.pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
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

        // Ambil data pengadaan beserta invoice-invoice yang terkait
        $pengadaan->load('invoices');

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
            'jumlah_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
            'invoices' => 'required|array', // Array invoice
            'invoices.*.no_invoice' => 'required|max:20',
            'invoices.*.jumlah_barang' => 'required|integer',
            'invoices.*.tgl_invoice' => 'required|date',
        ], messages: [
            'kode_pengadaan.required' => 'Masukkan Kode Pengadaan.',
            'kode_pengadaan.max' => 'Kode pengadaan maksimal 20 karakter.',
            'kode_pengadaan.unique' => 'Kode pengadaan sudah digunakan.',
            'no_invoice.max' => 'No. Invoice maksimal 20 karakter.',
            'no_seri_barang.required' => 'Masukkan No. Seri Barang.',
            'no_seri_barang.max' => 'No. Seri Barang maksimal 50 karakter.',
            'tahun_produksi.required' => 'Masukkan Tahun Produksi.',
            'tahun_produksi.size' => 'Tahun Produksi harus 4 digit.',
            'tgl_pengadaan.required' => 'Masukkan Tanggal Pengadaan.',
            'tgl_pengadaan.date' => 'Tanggal Pengadaan harus dalam format tanggal.',
            'harga_barang.required' => 'Masukkan Harga Barang.',
            'harga_barang.integer' => 'Harga Barang harus berupa angka.',
            'jumlah_barang.required' => 'Masukkan Jumlah Barang.',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka.',
            'nilai_barang.required' => 'Masukkan Nilai Barang.',
            'nilai_barang.integer' => 'Nilai Barang harus berupa angka.',
            'fb.required' => 'Pilih Fisik Barang.',
            'keterangan.max' => 'Keterangan maksimal 50 karakter.',
            'invoices.*.no_invoice.required' => 'Masukkan No. Invoice',
            'invoices.*.no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'invoices.*.jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'invoices.*.jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'invoices.*.tgl_invoice.required' => 'Masukkan Tanggal Invoice',
            'invoices.*.tgl_invoice.date' => 'Tanggal Invoice harus dalam format tanggal',
        ]);

        // Update data pengadaan
        $data = $request->except('invoices');
        $data['total_harga'] = $data['jumlah_barang'] * $data['harga_barang']; // Hitung ulang otomatis
        $pengadaan->update($data);

        // Hapus invoice lama dan simpan yang baru
        $pengadaan->invoices()->delete();
        foreach ($request->invoices as $invoiceData) {
            $pengadaan->invoices()->create($invoiceData);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui.');
    }

    /**
     * Update data pengadaan untuk user.
     */
    public function userUpdate(Request $request, Pengadaan $pengadaan)
    {
        $request->validate([
            'kode_pengadaan' => 'required|max:20|unique:tbl_pengadaan,kode_pengadaan,' . $pengadaan->id_pengadaan . ',id_pengadaan',
            'no_invoice' => 'nullable|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|size:4',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
            'invoices' => 'required|array', // Array invoice
            'invoices.*.no_invoice' => 'required|max:20',
            'invoices.*.jumlah_barang' => 'required|integer',
            'invoices.*.tgl_invoice' => 'required|date',
        ], messages: [
            'kode_pengadaan.required' => 'Kode Pengadaan harus diisi.',
            'kode_pengadaan.max' => 'Kode Pengadaan maksimal 20 karakter.',
            'kode_pengadaan.unique' => 'Kode Pengadaan sudah digunakan.',
            'no_invoice.max' => 'No. Invoice maksimal 20 karakter.',
            'no_seri_barang.required' => 'No. Seri Barang harus diisi.',
            'no_seri_barang.max' => 'No. Seri Barang maksimal 50 karakter.',
            'tahun_produksi.required' => 'Tahun Produksi harus diisi.',
            'tahun_produksi.size' => 'Tahun Produksi harus 4 digit.',
            'tgl_pengadaan.required' => 'Tanggal Pengadaan harus diisi.',
            'tgl_pengadaan.date' => 'Tanggal Pengadaan harus dalam format tanggal.',
            'harga_barang.required' => 'Harga Barang harus diisi.',
            'harga_barang.integer' => 'Harga Barang harus berupa angka.',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi.',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka.',
            'nilai_barang.required' => 'Nilai Barang harus diisi.',
            'nilai_barang.integer' => 'Nilai Barang harus berupa angka.',
            'fb.required' => 'Pilih Fisik Barang.',
            'keterangan.max' => 'Keterangan maksimal 50 karakter.',
            'invoices.*.no_invoice.required' => 'Masukkan No. Invoice',
            'invoices.*.no_invoice.max' => 'No. Invoice maksimal 20 karakter',
            'invoices.*.jumlah_barang.required' => 'Masukkan Jumlah Barang',
            'invoices.*.jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'invoices.*.tgl_invoice.required' => 'Masukkan Tanggal Invoice',
            'invoices.*.tgl_invoice.date' => 'Tanggal Invoice harus dalam format tanggal',
        ]);

        // Update data pengadaan
        $data = $request->except('invoices');
        $data['total_harga'] = $data['jumlah_barang'] * $data['harga_barang']; // Hitung ulang otomatis
        $pengadaan->update($data);

        // Hapus invoice lama dan simpan yang baru
        $pengadaan->invoices()->delete();
        foreach ($request->invoices as $invoiceData) {
            $pengadaan->invoices()->create($invoiceData);
        }

        return redirect()->route('user.pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui.');
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
     * Hapus data pengadaan untuk user.
     */
    public function userDestroy(Pengadaan $pengadaan)
    {
        $pengadaan->delete();

        return redirect()->route('user.pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }

    // Di dalam PengadaanController
    public function showDepresiasi($id)
    {
        $pengadaan = Pengadaan::with('depresiasi')->findOrFail($id);
        $detailDepresiasi = $pengadaan->getDetailDepresiasi();

        return view('admin.pengadaan.detail_depresiasi', compact('pengadaan', 'detailDepresiasi'));
    }



    public function userShowDepresiasi($id)
    {
        $pengadaan = Pengadaan::with('depresiasi')->findOrFail($id);
        $detailDepresiasi = $pengadaan->getDetailDepresiasi();

        return view('user.pengadaan.detail_depresiasi', compact('pengadaan', 'detailDepresiasi'));
    }
}
