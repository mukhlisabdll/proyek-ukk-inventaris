@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pengadaan.index') }}">Pengadaan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Pengadaan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengadaan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_master_barang" class="form-label">Nama Barang</label>
            <select class="form-control" id="id_master_barang" name="id_master_barang" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($masterBarangs as $item)
                    <option value="{{ $item->id_master_barang }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_depresiasi" class="form-label">Depresiasi</label>
            <select class="form-control" id="id_depresiasi" name="id_depresiasi" required>
                <option value="">-- Pilih Depresiasi --</option>
                @foreach ($depresiasis as $item)
                    <option value="{{ $item->id_depresiasi }}">{{ $item->lama_depresiasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_merk" class="form-label">Merk</label>
            <select class="form-control" id="id_merk" name="id_merk" required>
                <option value="">-- Pilih Merk --</option>
                @foreach ($merks as $item)
                    <option value="{{ $item->id_merk }}">{{ $item->merk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_satuan" class="form-label">Satuan</label>
            <select class="form-control" id="id_satuan" name="id_satuan" required>
                <option value="">-- Pilih Satuan --</option>
                @foreach ($satuans as $item)
                    <option value="{{ $item->id_satuan }}">{{ $item->satuan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_sub_kategori_asset" class="form-label">Sub Kategori Asset</label>
            <select class="form-control" id="id_sub_kategori_asset" name="id_sub_kategori_asset" required>
                <option value="">-- Pilih Sub Kategori Asset --</option>
                @foreach ($subKategoriAssets as $item)
                    <option value="{{ $item->id_sub_kategori_asset }}">{{ $item->sub_kategori_asset }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_distributor" class="form-label">Distributor</label>
            <select class="form-control" id="id_distributor" name="id_distributor" required>
                <option value="">-- Pilih Distributor --</option>
                @foreach ($distributors as $item)
                    <option value="{{ $item->id_distributor }}">{{ $item->nama_distributor }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_pengadaan" class="form-label">Kode Pengadaan</label>
            <input type="text" class="form-control" id="kode_pengadaan" name="kode_pengadaan" value="{{ old('kode_pengadaan') }}" required>
        </div>
        <div class="mb-3">
            <label for="no_invoice" class="form-label">No Invoice</label>
            <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="{{ old('no_invoice') }}">
        </div>
        <div class="mb-3">
            <label for="no_seri_barang" class="form-label">No Seri Barang</label>
            <input type="text" class="form-control" id="no_seri_barang" name="no_seri_barang" value="{{ old('no_seri_barang') }}" required>
        </div>
        <div class="mb-3">
            <label for="tahun_produksi" class="form-label">Tahun Produksi</label>
            <input type="text" class="form-control" id="tahun_produksi" name="tahun_produksi" value="{{ old('tahun_produksi') }}" required>
        </div>
        <div class="mb-3">
            <label for="tgl_pengadaan" class="form-label">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" value="{{ old('tgl_pengadaan') }}" required>
        </div>
        <div class="mb-3">
            <label for="harga_barang" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ old('harga_barang') }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required>
        </div>
        <div class="mb-3">
            <label for="fb" class="form-label">Flag Barang</label>
            <select class="form-control" id="fb" name="fb" required>
                <option value="0" {{ old('fb') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="1" {{ old('fb') == '1' ? 'selected' : '' }}>Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
