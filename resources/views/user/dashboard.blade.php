@extends('layouts.user')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Dashboard User</h2>

    <div class="row g-4 mt-3">

        <!-- Pengadaan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Pengadaan</h5>
                    <p class="card-text">Kelola data pengadaan barang.</p>
                    <a href="{{ route('user.pengadaan.index') }}" class="btn btn-dark">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Opname -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-clipboard-check"></i> Opname</h5>
                    <p class="card-text">Kelola data opname barang.</p>
                    <a href="{{ route('user.opname.index') }}" class="btn btn-secondary">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Hitung Depresiasi -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-calculator"></i> Hitung Depresiasi</h5>
                    <p class="card-text">Lihat data hitung depresiasi barang.</p>
                    <a href="{{ route('user.hitung-depresiasi.index') }}" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Akun -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-user"></i> Akun</h5>
                    <p class="card-text">Atur informasi akun Anda.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
