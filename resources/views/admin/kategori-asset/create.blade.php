@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori-asset.index') }}">Kategori Asset</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Kategori Asset</h1>
    <form action="{{ route('kategori-asset.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
            <input type="text" class="form-control" id="kode_kategori_asset" name="kode_kategori_asset" required>
        </div>
        <div class="mb-3">
            <label for="kategori_asset" class="form-label">Kategori Asset</label>
            <input type="text" class="form-control" id="kategori_asset" name="kategori_asset" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
