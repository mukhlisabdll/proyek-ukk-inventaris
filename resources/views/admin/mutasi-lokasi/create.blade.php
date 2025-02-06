@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mutasi-lokasi.index') }}">Mutasi Lokasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Mutasi Lokasi</h1>
    <form action="{{ route('mutasi-lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" class="form-control">
            <option value="">-- Pilih Lokasi --</option>
                @foreach ($lokasi as $item)
                    <option value="{{ $item->id_lokasi }}">{{ $item->nama_lokasi }}</option>
                @endforeach
            </select>
            @error('id_lokasi')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control">
            <option value="">-- Pilih Pengadaan --</option>
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}">{{ $item->kode_pengadaan }}</option>
                @endforeach
            </select>
            @error('id_pengadaan')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
            <input type="text" name="flag_lokasi" id="flag_lokasi" class="form-control">
            @error('flag_lokasi')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="flag_pindah" class="form-label">Flag Pindah</label>
            <input type="text" name="flag_pindah" id="flag_pindah" class="form-control">
            @error('flag_pindah')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
