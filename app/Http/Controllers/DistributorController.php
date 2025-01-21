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
     * Tampilkan semua data distributor untuk user.
     */
    public function userIndex(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = Distributor::where('nama_distributor', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhere('no_telp', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->get();
        } else {
            $data = Distributor::all();
        }

        return view('user.distributor.index', compact('data'));
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
