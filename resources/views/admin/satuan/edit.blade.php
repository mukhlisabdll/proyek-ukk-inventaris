@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('satuan.index') }}">Satuan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    <h1>Edit Satuan</h1>

    <form action="{{ route('satuan.update', $satuan->id_satuan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="satuan" class="form-label">Nama Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $satuan->satuan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
