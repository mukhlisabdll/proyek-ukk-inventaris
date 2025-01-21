@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Merk</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Merk</h1>
    <a href="{{ route('merk.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <!-- Search Form -->
    <form action="{{ route('merk.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Merk..." value="{{ request('search') }}">
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
                <th>Nama Merk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merks as $merk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $merk->merk }}</td>
                <td>{{ $merk->keterangan }}</td>
                <td>
                    <a href="{{ route('merk.edit', $merk->id_merk) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('merk.destroy', $merk->id_merk) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
