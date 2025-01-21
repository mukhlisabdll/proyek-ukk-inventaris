<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index(Request $request)
    {
        $query = HitungDepresiasi::with('pengadaan');

        if ($request->has('search')) {
            $query->where('bulan', 'like', '%' . $request->search . '%');
        }

        $depresiasi = $query->get();
        return view('admin.hitung-depresiasi.index', compact('depresiasi'));
    }

    public function userIndex(Request $request)
    {
        $query = HitungDepresiasi::with('pengadaan');

        if ($request->has('search')) {
            $query->where('bulan', 'like', '%' . $request->search . '%');
            $query->where('bulan', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();
        return view('user.hitung-depresiasi.index', compact('data'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ]);

        HitungDepresiasi::create($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil ditambahkan.');
    }

    public function edit(HitungDepresiasi $hitungDepresiasi)
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function update(Request $request, HitungDepresiasi $hitungDepresiasi)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ]);

        $hitungDepresiasi->update($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil diperbarui.');
    }

    public function destroy(HitungDepresiasi $hitungDepresiasi)
    {
        $hitungDepresiasi->delete();
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil dihapus.');
    }
}
