@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('depresiasi.index') }}">Depresiasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Depresiasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('depresiasi.update', $depresiasi->id_depresiasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="lama_depresiasi" class="form-label">Lama Depresiasi (Tahun)</label>
            <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" value="{{ $depresiasi->lama_depresiasi }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $depresiasi->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('depresiasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
