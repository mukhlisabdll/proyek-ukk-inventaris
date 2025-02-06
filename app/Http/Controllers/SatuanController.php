<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $satuans = Satuan::where('satuan', 'like', "%{$search}%")->get();
        } else {
            $satuans = Satuan::all();
        }
        
        return view('admin.satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|max:25|unique:tbl_satuan,satuan',
        ], messages:
        [
           'satuan.required' => 'Satuan harus diisi.',
           'satuan.max' => 'Satuan maksimal 25 karakter.',
           'satuan.unique' => 'Satuan sudah terdaftar.',
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('admin.satuan.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'satuan' => 'required|max:25|unique:tbl_satuan,satuan,' . $satuan->id_satuan . ',id_satuan',
        ], messages:
        [
            'satuan.required' => 'Satuan harus diisi.',
            'satuan.max' => 'Satuan maksimal 25 karakter.',
            'satuan.unique' => 'Satuan sudah terdaftar.',
        ]);
        
        $satuan->update($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus!');
    }
}
