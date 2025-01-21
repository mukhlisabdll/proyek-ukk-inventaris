<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $lokasis = Lokasi::where('kode_lokasi', 'like', "%{$search}%")
                ->orWhere('nama_lokasi', 'like', "%{$search}%")
                ->get();
        } else {
            $lokasis = Lokasi::all();
        }
        
        return view('admin.lokasi.index', compact('lokasis'));
    }

    /**
     * Tampilkan semua data lokasi untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = Lokasi::where('kode_lokasi', 'like', "%{$search}%")
                ->orWhere('nama_lokasi', 'like', "%{$search}%")
                ->get();
        } else {
            $data = Lokasi::all();
        }

        return view('user.lokasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|max:20|unique:tbl_lokasi,kode_lokasi',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'kode_lokasi' => 'required|max:20|unique:tbl_lokasi,kode_lokasi,' . $lokasi->id_lokasi . ',id_lokasi',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
