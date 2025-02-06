<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $distributors = Distributor::where('nama_distributor', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhere('no_telp', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->get();
        } else {
            $distributors = Distributor::all();
        }

        return view('admin.distributor.index', compact('distributors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'nullable|email|max:30',
            'keterangan' => 'nullable|max:45',
        ], messages: [
            'nama_distributor.required' => 'Nama distributor tidak boleh kosong',
            'nama_distributor.max' => 'Nama distributor maksimal 50 karakter',
            'alamat.required' => 'Alamat distributor tidak boleh kosong',
            'alamat.max' => 'Alamat distributor maksimal 50 karakter',
            'no_telp.required' => 'No. Telepon distributor tidak boleh kosong',
            'no_telp.max' => 'No. Telepon distributor maksimal 15 karakter',
            'email.email' => 'Format email salah',
            'email.max' => 'Email maksimal 30 karakter',
            'keterangan.nullable' => 'Keterangan optional',
            'keterangan.max' => 'Keterangan maksimal 45 karakter',
        ]);

        Distributor::create($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distributor $distributor)
    {
        return view('admin.distributor.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'nullable|email|max:30',
            'keterangan' => 'nullable|max:45',
        ], messages: [
            'nama_distributor.required' => 'Nama distributor tidak boleh kosong',
            'nama_distributor.max' => 'Nama distributor maksimal 50 karakter',
            'alamat.required' => 'Alamat distributor tidak boleh kosong',
            'alamat.max' => 'Alamat distributor maksimal 50 karakter',
            'no_telp.required' => 'No. Telepon distributor tidak boleh kosong',
            'no_telp.max' => 'No. Telepon distributor maksimal 15 karakter',
            'email.email' => 'Format email salah',
            'email.max' => 'Email maksimal 30 karakter',
            'keterangan.nullable' => 'Keterangan optional',
            'keterangan.max' => 'Keterangan maksimal 45 karakter',
        ]);

        $distributor->update($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus!');
    }
}
