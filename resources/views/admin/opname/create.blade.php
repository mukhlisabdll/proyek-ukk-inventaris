@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('opname.index') }}">Opname</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Opname</h1>
    <form action="{{ route('opname.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" onchange="updateJumlahPengadaan()">
            <option value="">-- Pilih Pengadaan --</option>
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}">{{ $item->kode_pengadaan }}</option>
                @endforeach
            </select>
            @error('id_pengadaan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" class="form-control">
            @error('tgl_opname')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kondisi_barang" class="form-label">Kondisi Barang</label>
            <select name="kondisi_barang" id="kondisi_barang" class="form-control">
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option value="Hilang">Hilang</option>
            </select>
            @error('kondisi_barang')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang (Pengadaan: <span id="jumlah_pengadaan"></span>)</label>
            <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" oninput="updateJumlahPengadaan()">
            @error('jumlah_barang')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            @error('keterangan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script>
    function updateJumlahPengadaan() {
        const pengadaan = @json($pengadaan);
        const selectedPengadaan = pengadaan.find(item => item.id_pengadaan == document.getElementById('id_pengadaan').value);
        const jumlahPengadaan = selectedPengadaan ? selectedPengadaan.jumlah_barang : 0;
        document.getElementById('jumlah_pengadaan').innerText = jumlahPengadaan;

        const kondisi = document.getElementById('kondisi_barang').value;
        const jumlahBarang = document.getElementById('jumlah_barang').value;

        if (kondisi === 'Rusak' || kondisi === 'Hilang') {
            const sisaBarang = jumlahPengadaan - jumlahBarang;
            if (sisaBarang < 0) {
                alert('Jumlah barang tidak boleh melebihi jumlah barang pengadaan.');
                document.getElementById('jumlah_barang').value = jumlahPengadaan;
            }
        }
    }
</script>
@endsection
