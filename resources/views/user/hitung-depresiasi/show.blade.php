@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.hitung-depresiasi.index') }}">Hitung Depresiasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Depresiasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Hitung Depresiasi</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Umum</h5>
            <p><strong>Kode Pengadaan:</strong> {{ $hitungDepresiasi->pengadaan->kode_pengadaan }}</p>
            <p><strong>Tanggal Hitung Depresiasi:</strong> {{ $hitungDepresiasi->tgl_hitung_depresiasi }}</p>
            <p><strong>Bulan:</strong> {{ $hitungDepresiasi->bulan }}</p>
            <p><strong>Durasi (bulan):</strong> {{ $hitungDepresiasi->durasi }}</p>
            <p><strong>Nilai Barang:</strong> Rp {{ number_format($hitungDepresiasi->nilai_barang, 0, ',', '.') }}</p>
            <p><strong>Nilai Depresiasi:</strong> Rp {{ number_format($nilaiDepresiasiPerBulan, 0, ',', '.') }}</p>
        </div>
    </div>

    <h3 class="mb-3">Detail Penyusutan Nilai Barang</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Bulan dan Tahun</th>
                    <th>Nilai Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailDepresiasi as $detail)
                    <tr>
                        <td>{{ $detail['bulan'] }}</td>
                        <td>Rp {{ number_format($detail['nilai'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('user.hitung-depresiasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection