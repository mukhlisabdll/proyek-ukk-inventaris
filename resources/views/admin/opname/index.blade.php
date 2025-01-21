@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Opname</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Opname</h1>
    <a href="{{ route('opname.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <form action="{{ route('opname.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Opname..." value="{{ request('search') }}">
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
                <th>Tanggal Opname</th>
                <th>Pengadaan</th>
                <th>Kondisi Barang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($opname as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tgl_opname }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->kondisi_barang }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('opname.edit', $item->id_opname) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('opname.destroy', $item->id_opname) }}" method="POST" class="d-inline">
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
