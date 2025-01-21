@extends('layouts.user')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Dashboard User</h2>

    <div class="row g-4">
        <!-- Master Barang -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-box"></i> Master Barang</h5>
                    <p class="card-text">Lihat data barang yang tersedia.</p>
                    <a href="{{ route('user.master-barang.index') }}" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Kategori Asset -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-tags"></i> Kategori Asset</h5>
                    <p class="card-text">Lihat kategori asset yang tersedia.</p>
                    <a href="{{ route('user.kategori-asset.index') }}" class="btn btn-secondary">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Sub Kategori Asset -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-tag"></i> Sub Kategori Asset</h5>
                    <p class="card-text">Lihat sub kategori asset yang tersedia.</p>
                    <a href="{{ route('user.sub-kategori-asset.index') }}" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <!-- Merk -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-industry"></i> Merk</h5>
                    <p class="card-text">Lihat data merk barang.</p>
                    <a href="{{ route('user.merk.index') }}" class="btn btn-danger">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Satuan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-balance-scale"></i> Satuan</h5>
                    <p class="card-text">Lihat data satuan barang.</p>
                    <a href="{{ route('user.satuan.index') }}" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Distributor -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-truck"></i> Distributor</h5>
                    <p class="card-text">Lihat data distributor barang.</p>
                    <a href="{{ route('user.distributor.index') }}" class="btn btn-info">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Lokasi -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Lokasi</h5>
                    <p class="card-text">Lihat data lokasi.</p>
                    <a href="{{ route('user.lokasi.index') }}" class="btn btn-light">Lihat</a>
                </div>
            </div>
        </div>

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

        <!-- Mutasi Lokasi -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-exchange-alt"></i> Mutasi Lokasi</h5>
                    <p class="card-text">Lihat data mutasi lokasi barang.</p>
                    <a href="{{ route('user.mutasi-lokasi.index') }}" class="btn btn-primary">Lihat</a>
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

        <!-- Depresiasi -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-chart-line"></i> Depresiasi</h5>
                    <p class="card-text">Lihat data depresiasi barang.</p>
                    <a href="{{ route('user.depresiasi.index') }}" class="btn btn-danger">Lihat</a>
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
