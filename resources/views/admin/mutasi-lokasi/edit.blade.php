@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mutasi-lokasi.index') }}">Mutasi Lokasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Mutasi Lokasi</h1>
    <form action="{{ route('mutasi-lokasi.update', $mutasiLokasi->id_mutasi_lokasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" class="form-control">
                @foreach ($lokasi as $lok)
                    <option value="{{ $lok->id_lokasi }}" {{ $mutasiLokasi->id_lokasi == $lok->id_lokasi ? 'selected' : '' }}>{{ $lok->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control">
                @foreach ($pengadaan as $peng)
                    <option value="{{ $peng->id_pengadaan }}" {{ $mutasiLokasi->id_pengadaan == $peng->id_pengadaan ? 'selected' : '' }}>{{ $peng->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="flag_lokasi" class="form-label">Flag Lokasi</label>
            <input type="text" name="flag_lokasi" id="flag_lokasi" value="{{ $mutasiLokasi->flag_lokasi }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="flag_pindah" class="form-label">Flag Pindah</label>
            <input type="text" name="flag_pindah" id="flag_pindah" value="{{ $mutasiLokasi->flag_pindah }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
