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
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Nama Barang</th>
                <th>Depresiasi</th>
                <th>Merk</th>
                <th>Satuan</th>
                <th>Sub Kategori Asset</th>
                <th>Distributor</th>
                <th>Invoice</th>
                <th>No Seri Barang</th>
                <th>Tahun Produksi</th>
                <th>Tanggal Pengadaan</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Total Harga</th>
                <th>Nilai Barang</th>
                <th>Depresiasi Barang</th>
                <th>Fisik Barang</th>
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
                    <td>
                        @if ($pengadaan->depresiasi)
                            {{ $pengadaan->depresiasi->lama_depresiasi }} bulan
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $pengadaan->merk->merk }}</td>
                    <td>{{ $pengadaan->satuan->satuan }}</td>
                    <td>{{ $pengadaan->subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $pengadaan->distributor->nama_distributor }}</td>
                    <td>
                        @if ($pengadaan->invoices->count() > 0)
                            <ul>
                                @foreach ($pengadaan->invoices as $invoice)
                                    <li>
                                        No Invoice: {{ $invoice->no_invoice }}, 
                                        Jumlah: {{ $invoice->jumlah_barang }}, 
                                        Tanggal: {{ $invoice->tgl_invoice }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            Tidak ada invoice.
                        @endif
                    </td>
                    <td>{{ $pengadaan->no_seri_barang }}</td>
                    <td>{{ $pengadaan->tahun_produksi }}</td>
                    <td>{{ $pengadaan->tgl_pengadaan }}</td>
                    <td>{{ $pengadaan->jumlah_barang }}</td>
                    <td>Rp{{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($pengadaan->total_harga, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                    <td>
                        @if ($pengadaan->depresiasi_barang)
                            Rp{{ number_format($pengadaan->depresiasi_barang, 0, ',', '.') }} / bulan
                        @else
                            Tidak ada depresiasi
                        @endif
                    </td>
                    <td>{{ $pengadaan->fb == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $pengadaan->keterangan }}</td>
                    <!-- Di dalam index.blade.php -->
                    <td>
                        <a href="{{ route('pengadaan.edit', $pengadaan->id_pengadaan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('pengadaan.depresiasi', $pengadaan->id_pengadaan) }}" class="btn btn-info btn-sm">Detail Depresiasi</a>
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
