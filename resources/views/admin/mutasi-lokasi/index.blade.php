@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mutasi Lokasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Mutasi Lokasi</h1>
    <a href="{{ route('mutasi-lokasi.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <form action="{{ route('mutasi-lokasi.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Lokasi atau Pengadaan" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Pengadaan</th>
                <th>Flag Lokasi</th>
                <th>Flag Pindah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutasiLokasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lokasi->nama_lokasi }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->flag_lokasi }}</td>
                    <td>{{ $item->flag_pindah }}</td>
                    <td>
                        <a href="{{ route('mutasi-lokasi.edit', $item->id_mutasi_lokasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mutasi-lokasi.destroy', $item->id_mutasi_lokasi) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
