<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $merks = Merk::where('merk', 'like', "%{$search}%")->get();
        } else {
            $merks = Merk::all();
        }

        return view('admin.merk.index', compact('merks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.merk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|max:50|unique:tbl_merk,merk',
            'keterangan' => 'nullable|max:55',
        ], messages:
        [
            'merk.required' => 'Merk wajib diisi.',
            'merk.max' => 'Merk maksimal 50 karakter.',
            'merk.unique' => 'Merk sudah digunakan.',
            'keterangan.nullable' => 'Keterangan optional.',
            'keterangan.max' => 'Keterangan maksimal 55 karakter.',
        ]);

        Merk::create($request->all());

        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merk $merk)
    {
        return view('admin.merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merk $merk)
    {
        $request->validate([
            'merk' => 'required|max:50|unique:tbl_merk,merk,' . $merk->id_merk . ',id_merk',
            'keterangan' => 'nullable|max:55',
        ], messages: [
            'merk.required' => 'Merk wajib diisi.',
            'merk.max' => 'Merk maksimal 50 karakter.',
            'merk.unique' => 'Merk sudah digunakan.',
            'keterangan.nullable' => 'Keterangan optional.',
            'keterangan.max' => 'Keterangan maksimal 55 karakter.',
        ]);

        $merk->update($request->all());

        return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus!');
    }
}
