<?php

namespace App\Http\Controllers;

use App\Models\Penyimpanan;
use App\Models\Opname;
use App\Models\Pengadaan;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class PenyimpananController extends Controller
{
    public function index()
    {
        $penyimpanan = Penyimpanan::with('lokasi')->get();
        return view('admin.penyimpanan.index', compact('penyimpanan'));
    }

    public function create()
    {
        $opname = Opname::all();
        $lokasi = Lokasi::all();
        return view('admin.penyimpanan.create', compact('opname', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_opname' => 'required|exists:tbl_opname,id_opname',
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'status' => 'required|in:baik,rusak,hilang',
        ]);

        $opname = Opname::find($request->id_opname);
        $pengadaan = Pengadaan::find($opname->id_pengadaan);

        $jumlah = $pengadaan->jumlah_barang - $opname->jumlah_barang;

        Penyimpanan::create([
            'id_pengadaan' => $opname->id_pengadaan,
            'id_opname' => $request->id_opname,
            'id_lokasi' => $request->id_lokasi,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $jumlah,
            'status' => $request->status,
        ]);

        return redirect()->route('penyimpanan.index')->with('success', 'Data Penyimpanan berhasil ditambahkan.');
    }

    public function edit(Penyimpanan $penyimpanan)
    {
        $opname = Opname::all();
        $lokasi = Lokasi::all();
        return view('admin.penyimpanan.edit', compact('penyimpanan', 'opname', 'lokasi'));
    }

    public function update(Request $request, Penyimpanan $penyimpanan)
    {
        $request->validate([
            'id_opname' => 'required|exists:tbl_opname,id_opname',
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'status' => 'required|in:baik,rusak,hilang',
        ]);

        $opname = Opname::find($request->id_opname);
        $pengadaan = Pengadaan::find($opname->id_pengadaan);

        $jumlah = $pengadaan->jumlah_barang - $opname->jumlah_barang;

        $penyimpanan->update([
            'id_pengadaan' => $opname->id_pengadaan,
            'id_opname' => $request->id_opname,
            'id_lokasi' => $request->id_lokasi,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $jumlah,
            'status' => $request->status,
        ]);

        return redirect()->route('penyimpanan.index')->with('success', 'Data Penyimpanan berhasil diperbarui.');
    }

    public function destroy(Penyimpanan $penyimpanan)
    {
        $penyimpanan->delete();
        return redirect()->route('penyimpanan.index')->with('success', 'Data Penyimpanan berhasil dihapus.');
    }
}
