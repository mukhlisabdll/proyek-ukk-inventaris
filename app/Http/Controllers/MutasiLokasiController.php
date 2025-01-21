<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    public function index(Request $request)
    {
        $query = MutasiLokasi::with(['lokasi', 'pengadaan']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('lokasi', function($q) use ($search) {
                $q->where('nama_lokasi', 'like', "%{$search}%");
            })->orWhereHas('pengadaan', function($q) use ($search) {
                $q->where('kode_pengadaan', 'like', "%{$search}%");
            });
        }

        $mutasiLokasi = $query->get();
        return view('admin.mutasi-lokasi.index', compact('mutasiLokasi'));
    }

    public function userIndex(Request $request)
    {
        $query = MutasiLokasi::with(['lokasi', 'pengadaan']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('lokasi', function($q) use ($search) {
                $q->where('nama_lokasi', 'like', "%{$search}%");
            })->orWhereHas('pengadaan', function($q) use ($search) {
                $q->where('kode_pengadaan', 'like', "%{$search}%");
            });
        }

        $mutasiLokasi = $query->get();
        return view('user.mutasi-lokasi.index', compact('mutasiLokasi'));
    }

    public function create()
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.create', compact('lokasi', 'pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'nullable|string|max:45',
            'flag_pindah' => 'nullable|string|max:45',
        ]);

        MutasiLokasi::create($request->all());
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil ditambahkan.');
    }

    public function edit(MutasiLokasi $mutasiLokasi)
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.edit', compact('mutasiLokasi', 'lokasi', 'pengadaan'));
    }

    public function update(Request $request, MutasiLokasi $mutasiLokasi)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'nullable|string|max:45',
            'flag_pindah' => 'nullable|string|max:45',
        ]);

        $mutasiLokasi->update($request->all());
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil diupdate.');
    }

    public function destroy(MutasiLokasi $mutasiLokasi)
    {
        $mutasiLokasi->delete();
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil dihapus.');
    }

}
