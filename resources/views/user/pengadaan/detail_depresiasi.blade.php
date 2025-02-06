@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.pengadaan.index') }}">Pengadaan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Depresiasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Depresiasi Barang: {{ $pengadaan->kode_pengadaan }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Barang</h5>
            <p><strong>Nama Barang:</strong> {{ $pengadaan->masterBarang->nama_barang }}</p>
            <p><strong>Harga Barang:</strong> Rp{{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</p>
            <p><strong>Lama Depresiasi:</strong> {{ $pengadaan->depresiasi->lama_depresiasi }} bulan</p>
            <p><strong>Depresiasi per Bulan:</strong> Rp{{ number_format($pengadaan->depresiasi_barang, 0, ',', '.') }}</p>
        </div>
    </div>

    <h3 class="mb-3">Detail Depresiasi per Bulan</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Bulan ke-</th>
                    <th>Nilai Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailDepresiasi as $detail)
                    <tr>
                        <td>{{ $detail['bulan'] }}</td>
                        <td>Rp{{ number_format($detail['nilai'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('user.pengadaan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection