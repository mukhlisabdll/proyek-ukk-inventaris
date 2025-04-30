@extends('layouts.admin')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('penyimpanan.index') }}">Penyimpanan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Penyimpanan</h1>
    <form action="{{ route('penyimpanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_opname" class="form-label">Opname</label>
            <select name="id_opname" id="id_opname" class="form-control" onchange="updatePengadaan()">
                <option value="">-- Pilih Opname --</option>
                @foreach ($opname as $item)
                    <option value="{{ $item->id_opname }}">{{ $item->pengadaan->kode_pengadaan }}</option>
                @endforeach
            </select>
            @error('id_opname')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" class="form-control">
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($lokasi as $item)
                    <option value="{{ $item->id_lokasi }}">{{ $item->nama_lokasi }}</option>
                @endforeach
            </select>
            @error('id_lokasi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            @error('nama_barang')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" oninput="validateJumlah()">
            @error('jumlah')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
                <option value="hilang">Hilang</option>
            </select>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script>
    function updatePengadaan() {
        const opname = @json($opname);
        const selectedOpname = opname.find(item => item.id_opname == document.getElementById('id_opname').value);
        document.getElementById('nama_barang').value = selectedOpname ? selectedOpname.pengadaan.barang.nama_barang : '';
    }

    function validateJumlah() {
        const opname = @json($opname);
        const selectedOpname = opname.find(item => item.id_opname == document.getElementById('id_opname').value);
        const jumlahPengadaan = selectedOpname ? selectedOpname.pengadaan.jumlah_barang : 0;
        const jumlahBarang = document.getElementById('jumlah').value;
        const status = document.getElementById('status').value;

        if (status !== 'baik' && jumlahBarang > jumlahPengadaan) {
            alert('Jumlah barang tidak boleh melebihi jumlah barang pengadaan.');
            document.getElementById('jumlah').value = jumlahPengadaan;
        }
    }
</script>
@endsection
