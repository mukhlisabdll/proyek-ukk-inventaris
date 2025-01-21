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

    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = Depresiasi::where('lama_depresiasi', 'like', "%{$search}%")->get();
        } else {
            $data = Depresiasi::all();
        }
        
        return view('user.depresiasi.index', compact('data'));
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
