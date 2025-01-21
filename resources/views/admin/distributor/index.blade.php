@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Distributor</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Distributor</h1>
    <a href="{{ route('distributor.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <!-- Search Form -->
    <form action="{{ route('distributor.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Distributor..." value="{{ request('search') }}">
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
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($distributors as $distributor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $distributor->nama_distributor }}</td>
                    <td>{{ $distributor->alamat }}</td>
                    <td>{{ $distributor->no_telp }}</td>
                    <td>{{ $distributor->email }}</td>
                    <td>{{ $distributor->keterangan }}</td>
                    <td>
                        <a href="{{ route('distributor.edit', $distributor->id_distributor) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('distributor.destroy', $distributor->id_distributor) }}" method="POST" class="d-inline">
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
