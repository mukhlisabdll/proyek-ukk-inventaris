@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sub-kategori-asset.index') }}">Sub Kategori Asset</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Sub Kategori Asset</h1>
    <form action="{{ route('sub-kategori-asset.update', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_sub_kategori_asset" class="form-label">Kode Sub Kategori</label>
            <input type="text" class="form-control" id="kode_sub_kategori_asset" name="kode_sub_kategori_asset" value="{{ $subKategoriAsset->kode_sub_kategori_asset }}" required>
            @error('kode_sub_kategori_asset')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sub_kategori_asset" class="form-label">Sub Kategori Asset</label>
            <input type="text" class="form-control" id="sub_kategori_asset" name="sub_kategori_asset" value="{{ $subKategoriAsset->sub_kategori_asset }}" required>
            @error('sub_kategori_asset')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_kategori_asset" class="form-label">Kategori Asset</label>
            <select class="form-select" id="id_kategori_asset" name="id_kategori_asset" required>
                @foreach ($kategoriAssets as $kategori)
                    <option value="{{ $kategori->id_kategori_asset }}" {{ $subKategoriAsset->id_kategori_asset == $kategori->id_kategori_asset ? 'selected' : '' }}>
                        {{ $kategori->kategori_asset }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori_asset')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
