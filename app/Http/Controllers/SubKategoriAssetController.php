<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $subKategoriAssets = SubKategoriAsset::where('kode_sub_kategori_asset', 'like', "%{$search}%")
                ->orWhere('sub_kategori_asset', 'like', "%{$search}%")
                ->get();
        } else {
            $subKategoriAssets = SubKategoriAsset::with('kategoriAsset')->get();
        }

        return view('admin.sub-kategori-asset.index', compact('subKategoriAssets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub-kategori-asset.create', compact('kategoriAssets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
            'kode_sub_kategori_asset' => 'required|max:20|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset',
            'sub_kategori_asset' => 'required|max:25',
        ]);

        SubKategoriAsset::create($request->all());

        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKategoriAsset $subKategoriAsset)
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub-kategori-asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKategoriAsset $subKategoriAsset)
    {
        $request->validate([
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
            'kode_sub_kategori_asset' => 'required|max:20|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset,' . $subKategoriAsset->id_sub_kategori_asset . ',id_sub_kategori_asset',
            'sub_kategori_asset' => 'required|max:25',
        ]);

        $subKategoriAsset->update($request->all());

        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub Kategori Asset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKategoriAsset $subKategoriAsset)
    {
        $subKategoriAsset->delete();
        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub Kategori Asset berhasil dihapus!');
    }

    /**
     * Tampilkan semua data sub kategori asset untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = SubKategoriAsset::where('kode_sub_kategori_asset', 'like', "%{$search}%")
            ->orWhere('sub_kategori_asset', 'like', "%{$search}%")
            ->get();
        } else {
            $data = SubKategoriAsset::all();
        }

        return view('user.sub-kategori-asset.index', compact('data'));
    }
}
