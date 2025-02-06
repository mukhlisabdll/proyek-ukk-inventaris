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
        ],  messages: [
            'kode_barang.required' => 'Kode Barang wajib diisi.',
            'kode_barang.max' => 'Kode Barang maksimal 20 karakter.',
            'kode_barang.unique' => 'Kode Barang sudah digunakan.',
            'nama_barang.required' => 'Nama Barang wajib diisi.',
            'nama_barang.max' => 'Nama Barang maksimal 100 karakter.',
            'spesifikasi_teknis.required' => 'Spesifikasi Teknis wajib diisi.',
            'spesifikasi_teknis.max' => 'Spesifikasi Teknis maksimal 100 karakter.',
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
        ], messages: [
            'kode_barang.required' => 'Kode Barang wajib diisi.',
            'kode_barang.max' => 'Kode Barang maksimal 20 karakter.',
            'kode_barang.unique' => 'Kode Barang sudah digunakan.',
            'nama_barang.required' => 'Nama Barang wajib diisi.',
            'nama_barang.max' => 'Nama Barang maksimal 100 karakter.',
            'spesifikasi_teknis.required' => 'Spesifikasi Teknis wajib diisi.',
            'spesifikasi_teknis.max' => 'Spesifikasi Teknis maksimal 100 karakter.',
        ]);

        $masterBarang->update($request->all());

        return redirect()->route('master-barang.index')->with('success', 'Master Barang berhasil diperbarui!');
    }

    /**
     * 
     */
    public function destroy(MasterBarang $masterBarang)
    {
        $masterBarang->delete();
        return redirect()->route('master-barang.index')->with('success', 'Master Barang berhasil dihapus!');
    }
}
