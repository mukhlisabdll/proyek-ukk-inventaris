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
                    <th>Flag Barang</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode_pengadaan }}</td>
                        <td>{{ $item->masterBarang->nama_barang }}</td>
                        <td>
                            @if ($item->depresiasi)
                                {{ $item->depresiasi->lama_depresiasi }} bulan
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->merk->merk }}</td>
                        <td>{{ $item->satuan->satuan }}</td>
                        <td>{{ $item->subKategoriAsset->sub_kategori_asset }}</td>
                        <td>{{ $item->distributor->nama_distributor }}</td>
                        <td>
                            @if ($item->invoices->count() > 0)
                                <ul>
                                    @foreach ($item->invoices as $invoice)
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
                        <td>{{ $item->no_seri_barang }}</td>
                        <td>{{ $item->tahun_produksi }}</td>
                        <td>{{ $item->tgl_pengadaan }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>Rp{{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                        <td>
                            @if ($item->depresiasi_barang)
                                Rp{{ number_format($item->depresiasi_barang, 0, ',', '.') }} / bulan
                            @else
                                Tidak ada depresiasi
                            @endif
                        </td>
                        <td>{{ $item->fb == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('user.pengadaan.detail_depresiasi', $item->id_pengadaan) }}" class="btn btn-info btn-sm">Detail Depresiasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection