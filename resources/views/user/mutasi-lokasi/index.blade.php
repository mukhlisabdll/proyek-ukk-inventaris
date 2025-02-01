@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mutasi Lokasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Mutasi Lokasi</h1>

    <!-- Search Form -->
    <form action="{{ route('user.mutasi-lokasi.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Mutasi Lokasi..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Kode Pengadaan</th>
                <th>Flag Lokasi</th>
                <th>Flag Pindah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasiLokasi as $mutasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mutasi->lokasi->nama_lokasi }}</td>
                <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                <td>{{ $mutasi->flag_lokasi }}</td>
                <td>{{ $mutasi->flag_pindah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
