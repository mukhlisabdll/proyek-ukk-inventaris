@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('opname.index') }}">Opname</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Opname</h1>
    <form action="{{ route('opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control">
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}" {{ $opname->id_pengadaan == $item->id_pengadaan ? 'selected' : '' }}>
                        {{ $item->kode_pengadaan }}
                    </option>
                @endforeach
            </select>
            @error('id_pengadaan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" value="{{ $opname->tgl_opname }}" class="form-control">
            @error('tgl_opname')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kondisi_barang" class="form-label">Kondisi Barang</label>
            <input type="text" name="kondisi_barang" id="kondisi_barang" value="{{ $opname->kondisi_barang }}" class="form-control">
            @error('kondisi_barang')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $opname->keterangan }}</textarea>
            @error('keterangan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
