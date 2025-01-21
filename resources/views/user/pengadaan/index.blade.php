@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengadaan</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengadaan</h1>
    <a href="{{ route('user.pengadaan.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <!-- Search Form -->
    <form action="{{ route('user.pengadaan.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari pengadaan berdasarkan kode..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

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
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_pengadaan }}</td>
                    <td>{{ $item->masterBarang->nama_barang }}</td>
                    <td>{{ $item->depresiasi->lama_depresiasi }}</td>
                    <td>{{ $item->merk->merk }}</td>
                    <td>{{ $item->satuan->satuan }}</td>
                    <td>{{ $item->subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                    <td>{{ $item->no_invoice }}</td>
                    <td>{{ $item->no_seri_barang }}</td>
                    <td>{{ $item->tahun_produksi }}</td>
                    <td>{{ $item->tgl_pengadaan }}</td>
                    <td>{{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                    <td>{{ $item->fb == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
