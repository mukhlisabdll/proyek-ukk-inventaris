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
     * Tampilkan semua data kategori asset untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = KategoriAsset::where('kode_kategori_asset', 'like', "%{$search}%")
            ->orWhere('kategori_asset', 'like', "%{$search}%")
            ->get();
        } else {
            $data = KategoriAsset::all();
        }

        return view('user.kategori-asset.index', compact('data'));
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
            'kode_kategori_asset' => 'required|max:20',
            'kategori_asset' => 'required|max:25',
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
            'kode_kategori_asset' => 'required|max:20',
            'kategori_asset' => 'required|max:25',
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
