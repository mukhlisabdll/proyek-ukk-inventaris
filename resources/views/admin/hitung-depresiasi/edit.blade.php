@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('hitung-depresiasi.index') }}">Hitung Depresiasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Data Hitung Depresiasi</h1>
    <form action="{{ route('hitung-depresiasi.update', $hitungDepresiasi->id_hitung_depresiasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" class="form-control">
                <option value="">-- Pilih Pengadaan --</option>
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}" {{ $item->id_pengadaan == $hitungDepresiasi->id_pengadaan ? 'selected' : '' }}>{{ $item->kode_pengadaan }}</option>
                @endforeach
            </select>
            @error('id_pengadaan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung</label>
            <input type="date" name="tgl_hitung_depresiasi" value="{{ $hitungDepresiasi->tgl_hitung_depresiasi }}" class="form-control">
            @error('tgl_hitung_depresiasi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" name="bulan" value="{{ $hitungDepresiasi->bulan }}" class="form-control">
            @error('bulan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="text" name="durasi" value="{{ $hitungDepresiasi->durasi }}" class="form-control">
            @error('durasi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="text" name="nilai_barang" value="{{ $hitungDepresiasi->nilai_barang }}" class="form-control">
            @error('nilai_barang')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
