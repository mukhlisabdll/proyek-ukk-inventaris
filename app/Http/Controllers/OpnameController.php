<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OpnameController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $opname = Opname::with('pengadaan')
            ->when($search, function ($query, $search) {
                return $query->where('kondisi_barang', 'like', "%{$search}%")
                             ->orWhere('tgl_opname', 'like', "%{$search}%")
                             ->orWhereHas('pengadaan', function ($query) use ($search) {
                                 $query->where('kode_pengadaan', 'like', "%{$search}%");
                             });
            })
            ->get();
        return view('admin.opname.index', compact('opname'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.opname.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi_barang' => ['required', 'string', 'max:25', rule::in(['Baik', 'Rusak', 'Hilang'])],
            'jumlah_barang' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:100',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan harus dipilih',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_opname.required' => 'Tanggal Opname harus diisi.',
            'tgl_opname.date' => 'Tanggal Opname harus dalam format tanggal.',
            'kondisi_barang.required' => 'Kondisi Barang harus diisi.',
            'kondisi_barang.string' => 'Kondisi Barang harus berupa string.',
            'kondisi_barang.max' => 'Kondisi Barang maksimal 25 karakter.',
            'kondisi_barang.in' => 'Kondisi Barang harus salah satu dari Baik.',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi.',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka.',
            'jumlah_barang.min' => 'Jumlah Barang harus lebih besar atau sama dengan 0.',
            'keterangan.string' => 'Keterangan harus berupa string.',
            'keterangan.max' => 'Keterangan maksimal 100 karakter.',
        ]);

        $pengadaan = Pengadaan::find($request->id_pengadaan);
        if ($request->kondisi_barang !== 'Baik' && $request->jumlah_barang > $pengadaan->jumlah_barang) {
            return back()->withErrors(['jumlah_barang' => 'Jumlah barang tidak boleh melebihi jumlah barang pengadaan.']);
        }

        Opname::create($request->all());
        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil ditambahkan.');
    }

    public function edit(Opname $opname)
    {
        $pengadaan = Pengadaan::all();
        return view('admin.opname.edit', compact('opname', 'pengadaan'));
    }

    public function update(Request $request, Opname $opname)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi_barang' => ['required', 'string', 'max:25', rule::in(['Baik', 'Rusak', 'Hilang'])],
            'jumlah_barang' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:100',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan harus dipilih',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_opname.required' => 'Tanggal Opname harus diisi.',
            'tgl_opname.date' => 'Tanggal Opname harus dalam format tanggal.',
            'kondisi_barang.required' => 'Kondisi Barang harus diisi.',
            'kondisi_barang.string' => 'Kondisi Barang harus berupa string.',
            'kondisi_barang.max' => 'Kondisi Barang maksimal 25 karakter.',
            'kondisi_barang.in' => 'Kondisi Barang harus salah satu dari Baik.',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi.',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka.',
            'jumlah_barang.min' => 'Jumlah Barang harus lebih besar atau sama dengan 0.',
            'keterangan.string' => 'Keterangan harus berupa string.',
            'keterangan.max' => 'Keterangan maksimal 100 karakter.',
        ]);

        $pengadaan = Pengadaan::find($request->id_pengadaan);
        if ($request->kondisi_barang !== 'Baik' && $request->jumlah_barang > $pengadaan->jumlah_barang) {
            return back()->withErrors(['jumlah_barang' => 'Jumlah barang tidak boleh melebihi jumlah barang pengadaan.']);
        }

        $opname->update($request->all());

        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil diperbarui.');
    }

    public function destroy(Opname $opname)
    {
        $opname->delete();
        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil dihapus.');
    }

    public function userIndex(Request $request)
    {
        $data = Opname::with('pengadaan')
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('kondisi_barang', 'like', "%{$search}%")
                             ->orWhere('tgl_opname', 'like', "%{$search}%")
                             ->orWhereHas('pengadaan', function ($query) use ($search) {
                                 $query->where('kode_pengadaan', 'like', "%{$search}%");
                             });
            })
            ->get();
        return view('user.opname.index', compact('data'));
    }

    public function userCreate()
    {
        $pengadaan = Pengadaan::all();
        return view('user.opname.create', compact('pengadaan'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi_barang' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan harus dipilih',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_opname.required' => 'Tanggal Opname harus diisi.',
            'tgl_opname.date' => 'Tanggal Opname harus dalam format tanggal.',
            'kondisi_barang.required' => 'Kondisi Barang harus diisi.',
            'kondisi_barang.string' => 'Kondisi Barang harus berupa string.',
            'kondisi_barang.max' => 'Kondisi Barang maksimal 25 karakter.',
            'keterangan.string' => 'Keterangan harus berupa string.',
            'keterangan.max' => 'Keterangan maksimal 100 karakter.',
        ]);

        Opname::create($request->all());
        return redirect()->route('user.opname.index')->with('success', 'Data Opname berhasil ditambahkan.');
    }
}
