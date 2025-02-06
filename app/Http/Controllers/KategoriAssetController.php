<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    /**
     * Tampilkan semua data kategori asset.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = KategoriAsset::where('kode_kategori_asset', 'like', "%{$search}%")
            ->orWhere('kategori_asset', 'like', "%{$search}%")
            ->get();
        } else {
            $data = KategoriAsset::all();
        }

        return view('admin.kategori-asset.index', compact('data'));
    }

    /**
     * Tampilkan form tambah kategori asset.
     */
    public function create()
    {
        return view('admin.kategori-asset.create');
    }

    /**
     * Simpan data kategori asset baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori_asset' => 'required|max:20|unique:tbl_kategori_asset,kode_kategori_asset',
            'kategori_asset' => 'required|max:25',
        ], messages: [
            'kode_kategori_asset.required' => 'Kode Kategori Asset wajib diisi!',
            'kode_kategori_asset.max' => 'Kode Kategori Asset max 20 karakter',
            'kode_kategori_asset.unique' => 'Kode Kategori Asset sudah digunakan!',
            'kategori_asset.required' => 'Nama Kategori Asset wajib diisi!',
            'kategori_asset.max' => 'Nama Kategori Asset tidak boleh lebih dari 25 karakter!',
        ]);

        KategoriAsset::create($request->all());

        return redirect()->route('kategori-asset.index')->with('success', 'Kategori Asset berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kategori asset.
     */
    public function edit($id)
    {
        $data = KategoriAsset::findOrFail($id);
        return view('admin.kategori-asset.edit', compact('data'));
    }

    /**
     * Update data kategori asset.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kategori_asset' => 'required|max:20|unique:tbl_kategori_asset,kode_kategori_asset,' . $id . ',id_kategori_asset',
            'kategori_asset' => 'required|max:25',
        ], messages: [
            'kode_kategori_asset.required' => 'Kode Kategori Asset wajib diisi!',
            'kode_kategori_asset.max' => 'Kode Kategori Asset tidak boleh lebih dari 20 karakter!',
            'kode_kategori_asset.unique' => 'Kode Kategori Asset sudah digunakan!',
            'kategori_asset.required' => 'Nama Kategori Asset wajib diisi!',
            'kategori_asset.max' => 'Nama Kategori Asset tidak boleh lebih dari 25 karakter!',
        ]);

        $data = KategoriAsset::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('kategori-asset.index')->with('success', 'Kategori Asset berhasil diperbarui!');
    }

    /**
     * Hapus data kategori asset.
     */
    public function destroy($id)
    {
        KategoriAsset::destroy($id);

        return redirect()->route('kategori-asset.index')->with('success', 'Kategori Asset berhasil dihapus!');
    }
}
