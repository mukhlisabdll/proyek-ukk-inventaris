@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hitung Depresiasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Hitung Depresiasi</h1>
    <a href="{{ route('user.hitung-depresiasi.create') }}" class="btn btn-primary mb-3">Tambah</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.hitung-depresiasi.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Pengadaan...." value="{{ request('search') }}">
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
                <th>Pengadaan</th>
                <th>Tanggal Hitung</th>
                <th>Bulan</th>
                <th>Durasi (bulan)</th>
                <th>Nilai Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->tgl_hitung_depresiasi }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->durasi }}</td>
                    <td>Rp {{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('user.hitung-depresiasi.show', $item->id_hitung_depresiasi) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('user.hitung-depresiasi.edit', $item->id_hitung_depresiasi) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
