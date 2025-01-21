@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('master-barang.index') }}">Master Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Barang</h1>

    <form action="{{ route('master-barang.update', $masterBarang->id_master_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $masterBarang->kode_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $masterBarang->nama_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
            <input type="text" class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" value="{{ $masterBarang->spesifikasi_teknis }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
