@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('master-barang.index') }}">Master Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Barang</h1>
    <form action="{{ route('master-barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
            @error('kode_barang')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            @error('nama_barang')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
            <input type="text" class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" required>
            @error('spesifikasi_teknis')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
