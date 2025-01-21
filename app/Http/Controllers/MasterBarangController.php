<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $masterBarangs = MasterBarang::where('kode_barang', 'like', "%{$search}%")
                ->orWhere('nama_barang', 'like', "%{$search}%")
                ->orWhere('spesifikasi_teknis', 'like', "%{$search}%")
                ->get();
        } else {
            $masterBarangs = MasterBarang::all();
        }

        return view('admin.master-barang.index', compact('masterBarangs'));
    }

    /**
     * Tampilkan semua data master barang untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = MasterBarang::where('kode_barang', 'like', "%{$search}%")
                ->orWhere('nama_barang', 'like', "%{$search}%")
                ->orWhere('spesifikasi_teknis', 'like', "%{$search}%")
                ->get();
        } else {
            $data = MasterBarang::all();
        }

        return view('user.master-barang.index', compact('data'));
    }

    /**
     * Tampilkan form tambah master barang untuk user.
     */

    /**
     * Simpan data master barang baru untuk user.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|max:20|unique:tbl_master_barang,kode_barang',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        MasterBarang::create($request->all());

        return redirect()->route('master-barang.index')->with('success', 'Master Barang berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterBarang $masterBarang)
    {
        return view('admin.master-barang.edit', compact('masterBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterBarang $masterBarang)
    {
        $request->validate([
            'kode_barang' => 'required|max:20|unique:tbl_master_barang,kode_barang,' . $masterBarang->id_master_barang . ',id_master_barang',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        $masterBarang->update($request->all());

        return redirect()->route('master-barang.index')->with('success', 'Master Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBarang $masterBarang)
    {
        $masterBarang->delete();
        return redirect()->route('master-barang.index')->with('success', 'Master Barang berhasil dihapus!');
    }
}
