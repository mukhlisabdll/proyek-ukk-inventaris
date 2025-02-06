<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $depresiasis = Depresiasi::where('lama_depresiasi', 'like', "%{$search}%")->get();
        } else {
            $depresiasis = Depresiasi::all();
        }
        
        return view('admin.depresiasi.index', compact('depresiasis'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:50',
        ], messages: [
            'lama_depresiasi.required' => 'Lama Depresiasi harus diisi.',
            'lama_depresiasi.integer' => 'Lama Depresiasi harus berupa angka.',
            'lama_depresiasi.min' => 'Lama Depresiasi minimal 1.',
            'keterangan.string' => 'Keterangan harus berupa string.',
            'keterangan.max' => 'Keterangan maksimal 50 karakter.',
        ]);

        Depresiasi::create($request->all());

        return redirect()->route('depresiasi.index')->with('success', 'Data Depresiasi berhasil ditambahkan.');
    }

    public function edit(Depresiasi $depresiasi)
    {
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, Depresiasi $depresiasi)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:50',
        ], messages: [
            'lama_depresiasi.required' => 'Lama Depresiasi harus diisi.',
            'lama_depresiasi.integer' => 'Lama Depresiasi harus berupa angka.',
            'lama_depresiasi.min' => 'Lama Depresiasi minimal 1.',
            'keterangan.string' => 'Keterangan harus berupa string.',
            'keterangan.max' => 'Keterangan maksimal 50 karakter.',
        ]);

        $depresiasi->update($request->all());

        return redirect()->route('depresiasi.index')->with('success', 'Data Depresiasi berhasil diperbarui.');
    }

    public function destroy(Depresiasi $depresiasi)
    {
        $depresiasi->delete();

        return redirect()->route('depresiasi.index')->with('success', 'Data Depresiasi berhasil dihapus.');
    }
}
