<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $hitungDepresiasi = HitungDepresiasi::with('pengadaan')
            ->when($search, function ($query, $search) {
                return $query->where('tgl_hitung_depresiasi', 'like', "%{$search}%")
                             ->orWhere('bulan', 'like', "%{$search}%")
                             ->orWhere('durasi', 'like', "%{$search}%")
                             ->orWhereHas('pengadaan', function ($query) use ($search) {
                                 $query->where('kode_pengadaan', 'like', "%{$search}%");
                             });
            })
            ->get();
        return view('admin.hitung-depresiasi.index', compact('hitungDepresiasi'));
    }

    public function userIndex(Request $request)
    {
        $data = HitungDepresiasi::with('pengadaan')
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('tgl_hitung_depresiasi', 'like', "%{$search}%")
                             ->orWhere('bulan', 'like', "%{$search}%")
                             ->orWhere('durasi', 'like', "%{$search}%")
                             ->orWhereHas('pengadaan', function ($query) use ($search) {
                                 $query->where('kode_pengadaan', 'like', "%{$search}%");
                             });
            })
            ->get();
        return view('user.hitung-depresiasi.index', compact('data'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.create', compact('pengadaan'));
    }

    public function userCreate()
    {
        $pengadaan = Pengadaan::all();
        return view('user.hitung-depresiasi.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan tidak boleh kosong',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_hitung_depresiasi.required' => 'Tanggal hitung depresiasi tidak boleh kosong',
            'tgl_hitung_depresiasi.date' => 'Tanggal hitung depresiasi harus berupa tanggal',
            'bulan.required' => 'Bulan tidak boleh kosong',
            'bulan.string' => 'Bulan harus berupa string',
            'bulan.max' => 'Bulan maksimal 10 karakter',
            'durasi.required' => 'Durasi depresiasi tidak boleh kosong',
            'durasi.integer' => 'Durasi depresiasi harus berupa angka',
            'durasi.min' => 'Durasi depresiasi harus lebih besar dari 0',
            'nilai_barang.required' => 'Nilai barang depresiasi tidak boleh kosong',
            'nilai_barang.integer' => 'Nilai barang depresiasi harus berupa angka',
        ]);

        HitungDepresiasi::create($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil ditambahkan.');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan tidak boleh kosong',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_hitung_depresiasi.required' => 'Tanggal hitung depresiasi tidak boleh kosong',
            'tgl_hitung_depresiasi.date' => 'Tanggal hitung depresiasi harus berupa tanggal',
            'bulan.required' => 'Bulan tidak boleh kosong',
            'bulan.string' => 'Bulan harus berupa string',
            'bulan.max' => 'Bulan maksimal 10 karakter',
            'durasi.required' => 'Durasi depresiasi tidak boleh kosong',
            'durasi.integer' => 'Durasi depresiasi harus berupa angka',
            'durasi.min' => 'Durasi depresiasi harus lebih besar dari 0',
            'nilai_barang.required' => 'Nilai barang depresiasi tidak boleh kosong',
            'nilai_barang.integer' => 'Nilai barang depresiasi harus berupa angka',
        ]);

        HitungDepresiasi::create($request->all());
        return redirect()->route('user.hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil ditambahkan.');
    }

    public function edit(HitungDepresiasi $hitungDepresiasi)
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function userEdit(HitungDepresiasi $hitungDepresiasi)
    {
        $pengadaan = Pengadaan::all();
        return view('user.hitung-depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function update(Request $request, HitungDepresiasi $hitungDepresiasi)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan tidak boleh kosong',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_hitung_depresiasi.required' => 'Tanggal hitung depresiasi tidak boleh kosong',
            'tgl_hitung_depresiasi.date' => 'Tanggal hitung depresiasi harus berupa tanggal',
            'bulan.required' => 'Bulan tidak boleh kosong',
            'bulan.string' => 'Bulan harus berupa string',
            'bulan.max' => 'Bulan maksimal 10 karakter',
            'durasi.required' => 'Durasi depresiasi tidak boleh kosong',
            'durasi.integer' => 'Durasi depresiasi harus berupa angka',
            'durasi.min' => 'Durasi depresiasi harus lebih besar dari 0',
            'nilai_barang.required' => 'Nilai barang depresiasi tidak boleh kosong',
            'nilai_barang.integer' => 'Nilai barang depresiasi harus berupa angka',
        ]);

        $hitungDepresiasi->update($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil diperbarui.');
    }

    public function userUpdate(Request $request, HitungDepresiasi $hitungDepresiasi)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ], messages: [
            'id_pengadaan.required' => 'Pengadaan tidak boleh kosong',
            'id_pengadaan.exists' => 'Pengadaan tidak ditemukan.',
            'tgl_hitung_depresiasi.required' => 'Tanggal hitung depresiasi tidak boleh kosong',
            'tgl_hitung_depresiasi.date' => 'Tanggal hitung depresiasi harus berupa tanggal',
            'bulan.required' => 'Bulan tidak boleh kosong',
            'bulan.string' => 'Bulan harus berupa string',
            'bulan.max' => 'Bulan maksimal 10 karakter',
            'durasi.required' => 'Durasi depresiasi tidak boleh kosong',
            'durasi.integer' => 'Durasi depresiasi harus berupa angka',
            'durasi.min' => 'Durasi depresiasi harus lebih besar dari 0',
            'nilai_barang.required' => 'Nilai barang depresiasi tidak boleh kosong',
            'nilai_barang.integer' => 'Nilai barang depresiasi harus berupa angka',
        ]);

        $hitungDepresiasi->update($request->all());
        return redirect()->route('user.hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil diperbarui.');
    }

    public function destroy(HitungDepresiasi $hitungDepresiasi)
    {
        $hitungDepresiasi->delete();
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Data depresiasi berhasil dihapus.');
    }

    public function show(HitungDepresiasi $hitungDepresiasi)
    {
        // Ambil data pengadaan dan hitung depresiasi
        $hitungDepresiasi->load('pengadaan');
    
        // Hitung nilai depresiasi per bulan
        $nilaiDepresiasiPerBulan = $hitungDepresiasi->nilai_barang / $hitungDepresiasi->durasi;
    
        // Buat array untuk menyimpan detail depresiasi per bulan
        $detailDepresiasi = [];
        $bulanAwal = \Carbon\Carbon::parse($hitungDepresiasi->tgl_hitung_depresiasi); // Gunakan tgl_hitung_depresiasi sebagai bulan awal
    
        for ($i = 1; $i <= $hitungDepresiasi->durasi; $i++) {
            if ($i == 1) {
                // Bulan pertama, nilai tetap sama dengan nilai_barang
                $nilai = $hitungDepresiasi->nilai_barang;
            } else {
                // Mulai bulan kedua, nilai dikurangi sesuai depresiasi per bulan
                $nilai = $hitungDepresiasi->nilai_barang - ($nilaiDepresiasiPerBulan * ($i - 1));
            }
            $detailDepresiasi[] = [
                'bulan' => $bulanAwal->format('F Y'), // Format bulan dan tahun (contoh: October 2023)
                'nilai' => max($nilai, 0), // Pastikan nilai tidak negatif
            ];
            $bulanAwal->addMonth(); // Tambah 1 bulan
        }
    
        return view('admin.hitung-depresiasi.show', compact('hitungDepresiasi', 'detailDepresiasi', 'nilaiDepresiasiPerBulan'));
    }

    public function userShow(HitungDepresiasi $hitungDepresiasi)
    {
        // Ambil data pengadaan dan hitung depresiasi
        $hitungDepresiasi->load('pengadaan');
    
        // Hitung nilai depresiasi per bulan
        $nilaiDepresiasiPerBulan = $hitungDepresiasi->nilai_barang / $hitungDepresiasi->durasi;
    
        // Buat array untuk menyimpan detail depresiasi per bulan
        $detailDepresiasi = [];
        $bulanAwal = \Carbon\Carbon::parse($hitungDepresiasi->tgl_hitung_depresiasi); // Gunakan tgl_hitung_depresiasi sebagai bulan awal
    
        for ($i = 1; $i <= $hitungDepresiasi->durasi; $i++) {
            if ($i == 1) {
                // Bulan pertama, nilai tetap sama dengan nilai_barang
                $nilai = $hitungDepresiasi->nilai_barang;
            } else {
                // Mulai bulan kedua, nilai dikurangi sesuai depresiasi per bulan
                $nilai = $hitungDepresiasi->nilai_barang - ($nilaiDepresiasiPerBulan * ($i - 1));
            }
            $detailDepresiasi[] = [
                'bulan' => $bulanAwal->format('F Y'), // Format bulan dan tahun (contoh: October 2023)
                'nilai' => max($nilai, 0), // Pastikan nilai tidak negatif
            ];
            $bulanAwal->addMonth(); // Tambah 1 bulan
        }
    
        return view('user.hitung-depresiasi.show', compact('hitungDepresiasi', 'detailDepresiasi', 'nilaiDepresiasiPerBulan'));
    }
}