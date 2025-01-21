@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengadaan</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengadaan</h1>
    <a href="{{ route('pengadaan.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <!-- Search Form -->
    <form action="{{ route('pengadaan.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Pengadaan..." value="{{ request('search') }}">
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
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Nama Barang</th>
                <th>Depresiasi</th>
                <th>Merk</th>
                <th>Satuan</th>
                <th>Sub Kategori Asset</th>
                <th>Distributor</th>
                <th>No Invoice</th>
                <th>No Seri Barang</th>
                <th>Tahun Produksi</th>
                <th>Tanggal Pengadaan</th>
                <th>Harga Barang</th>
                <th>Nilai Barang</th>
                <th>Flag Barang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengadaans as $key => $pengadaan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pengadaan->kode_pengadaan }}</td>
                    <td>{{ $pengadaan->masterBarang->nama_barang }}</td>
                    <td>{{ $pengadaan->depresiasi->lama_depresiasi }}</td>
                    <td>{{ $pengadaan->merk->merk }}</td>
                    <td>{{ $pengadaan->satuan->satuan }}</td>
                    <td>{{ $pengadaan->subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $pengadaan->distributor->nama_distributor }}</td>
                    <td>{{ $pengadaan->no_invoice }}</td>
                    <td>{{ $pengadaan->no_seri_barang }}</td>
                    <td>{{ $pengadaan->tahun_produksi }}</td>
                    <td>{{ $pengadaan->tgl_pengadaan }}</td>
                    <td>{{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                    <td>{{ $pengadaan->fb == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $pengadaan->keterangan }}</td>
                    <td>
                        <a href="{{ route('pengadaan.edit', $pengadaan->id_pengadaan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengadaan.destroy', $pengadaan->id_pengadaan) }}" method="POST" class="d-inline">
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
