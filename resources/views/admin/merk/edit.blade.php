@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('merk.index') }}">Merk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Merk</h1>

    <form action="{{ route('merk.update', $merk->id_merk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="{{ $merk->merk }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $merk->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
