@extends('layouts.user')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kategori Asset</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Kategori Asset</h1>

    <!-- Search Form -->
    <form action="{{ route('user.kategori-asset.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Kategori Asset..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_kategori_asset }}</td>
                    <td>{{ $item->kategori_asset }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
