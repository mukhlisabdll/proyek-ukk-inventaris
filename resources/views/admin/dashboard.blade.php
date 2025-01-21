@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Dashboard</h2>

    <div class="row">
        <!-- Cards Column -->
        <div class="col-md-6">
            <div class="row g-4">
                <!-- Master Barang -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-box"></i> Master Barang</h5>
                            <p class="card-text">Kelola data barang yang tersedia.</p>
                            <a href="{{ route('master-barang.index') }}" class="btn" style="background-color: #007bff; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Kategori Asset -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-tags"></i> Kategori Asset</h5>
                            <p class="card-text">Kelola kategori asset untuk inventaris.</p>
                            <a href="{{ route('kategori-asset.index') }}" class="btn" style="background-color: #28a745; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Sub Kategori Asset -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-tag"></i> Sub Kategori Asset</h5>
                            <p class="card-text">Kelola sub kategori asset dalam sistem.</p>
                            <a href="{{ route('sub-kategori-asset.index') }}" class="btn" style="background-color: #dc3545; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Merk -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-industry"></i> Merk</h5>
                            <p class="card-text">Kelola data merk barang.</p>
                            <a href="{{ route('merk.index') }}" class="btn" style="background-color: #ffc107; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Satuan -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-balance-scale"></i> Satuan</h5>
                            <p class="card-text">Kelola data satuan barang.</p>
                            <a href="{{ route('satuan.index') }}" class="btn" style="background-color: #17a2b8; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Distributor -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-truck"></i> Distributor</h5>
                            <p class="card-text">Kelola data distributor barang.</p>
                            <a href="{{ route('distributor.index') }}" class="btn" style="background-color: #6c757d; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Lokasi</h5>
                            <p class="card-text">Kelola data lokasi.</p>
                            <a href="{{ route('lokasi.index') }}" class="btn" style="background-color: #343a40; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Pengadaan -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Pengadaan</h5>
                            <p class="card-text">Kelola data pengadaan barang.</p>
                            <a href="{{ route('pengadaan.index') }}" class="btn" style="background-color: #fd7e14; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Mutasi Lokasi -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-exchange-alt"></i> Mutasi Lokasi</h5>
                            <p class="card-text">Kelola data mutasi lokasi barang.</p>
                            <a href="{{ route('mutasi-lokasi.index') }}" class="btn" style="background-color: #6610f2; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Opname -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-clipboard-check"></i> Opname</h5>
                            <p class="card-text">Kelola data opname barang.</p>
                            <a href="{{ route('opname.index') }}" class="btn" style="background-color: #e83e8c; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Hitung Depresiasi -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-calculator"></i> Hitung Depresiasi</h5>
                            <p class="card-text">Kelola data hitung depresiasi barang.</p>
                            <a href="{{ route('hitung-depresiasi.index') }}" class="btn" style="background-color: #20c997; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Depresiasi -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-chart-line"></i> Depresiasi</h5>
                            <p class="card-text">Kelola data depresiasi barang.</p>
                            <a href="{{ route('depresiasi.index') }}" class="btn" style="background-color: #fdc107; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>

                <!-- Akun -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-user"></i> Akun</h5>
                            <p class="card-text">Atur informasi akun Anda.</p>
                            <a href="{{ route('profile.edit') }}" class="btn" style="background-color: #6f42c1; color: #fff;">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Column -->
        <div class="col-md-6">
            <!-- Pie Chart -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-chart-pie"></i> Summary Chart</h5>
                    <canvas id="summaryChart" style="max-height: 400px;"></canvas>
                </div>
            </div>

            <!-- Additional Analytics -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-chart-bar"></i> Monthly Additions</h5>
                    <canvas id="monthlyAdditionsChart" style="max-height: 400px;"></canvas>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fas fa-chart-line"></i> Trend Analysis</h5>
                    <canvas id="trendAnalysisChart" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for the summary chart
    const summaryData = {
        labels: [
            'Master Barang', 
            'Kategori Asset', 
            'Sub Kategori Asset', 
            'Merk', 
            'Satuan', 
            'Distributor', 
            'Lokasi', 
            'Pengadaan', 
            'Mutasi Lokasi', 
            'Opname', 
            'Hitung Depresiasi', 
            'Depresiasi', 
            'Akun'
        ],
        datasets: [{
            data: [
                {{ $data['masterBarang'] }},
                {{ $data['kategoriAsset'] }},
                {{ $data['subKategoriAsset'] }},
                {{ $data['merk'] }},
                {{ $data['satuan'] }},
                {{ $data['distributor'] }},
                {{ $data['lokasi'] }},
                {{ $data['pengadaan'] }},
                {{ $data['mutasiLokasi'] }},
                {{ $data['opname'] }},
                {{ $data['hitungDepresiasi'] }},
                {{ $data['depresiasi'] }},
                {{ $data['akun'] }}
            ],
            backgroundColor: [
                '#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8', '#6c757d', '#343a40', '#fd7e14', '#6610f2', '#e83e8c', '#20c997', '#fdc107', '#6f42c1'
            ]
        }]
    };

    // Initialize the summary chart
    const ctxSummary = document.getElementById('summaryChart').getContext('2d');
    new Chart(ctxSummary, {
        type: 'pie',
        data: summaryData
    });

    // Use summary data for additional analytics
    const monthlyAdditionsData = {
        labels: summaryData.labels,
        datasets: [{
            label: 'Monthly Additions',
            data: summaryData.datasets[0].data,
            backgroundColor: '#007bff'
        }]
    };

    const trendAnalysisData = {
        labels: summaryData.labels,
        datasets: [{
            label: 'Trend Analysis',
            data: summaryData.datasets[0].data,
            borderColor: '#007bff',
            fill: false
        }]
    };

    // Initialize additional analytics charts
    const ctxMonthlyAdditions = document.getElementById('monthlyAdditionsChart').getContext('2d');
    new Chart(ctxMonthlyAdditions, {
        type: 'bar',
        data: monthlyAdditionsData
    });

    const ctxTrendAnalysis = document.getElementById('trendAnalysisChart').getContext('2d');
    new Chart(ctxTrendAnalysis, {
        type: 'line',
        data: trendAnalysisData
    });
</script>
@endsection
