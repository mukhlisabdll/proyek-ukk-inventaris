@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Depresiasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Depresiasi</h1>
    <a href="{{ route('depresiasi.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <form action="{{ route('depresiasi.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Depresiasi" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Lama Depresiasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depresiasis as $key => $depresiasi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $depresiasi->lama_depresiasi }} tahun</td>
                    <td>{{ $depresiasi->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('depresiasi.edit', $depresiasi->id_depresiasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('depresiasi.destroy', $depresiasi->id_depresiasi) }}" method="POST" class="d-inline">
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
</div>
@endsection
