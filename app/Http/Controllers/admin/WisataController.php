<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\wisatamodels;
use App\Models\Kategori;
use App\Models\KategoriModel;
use App\Models\testimonimodel;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
    // =========================
    // DASHBOARD
    // =========================
    public function index()
    {
        // total pendapatan
        $totalPembelianTiket = Transaksi::where('payment_status', 'settlement')
            ->sum('jumlah_tiket');

        // ==========================
        // TOTAL PENDAPATAN HARI INI
        // (ambil dari total_bayar)
        // ==========================
        $pendapatanHariIni = Transaksi::where('payment_status', 'settlement')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_bayar');
        // =========================
        // HARIAN (per jam - hari ini)
        // =========================
        $harian = Transaksi::select(
            DB::raw('HOUR(created_at) as label'),
            DB::raw('SUM(total_bayar) as total')
        )
            ->where('payment_status', 'settlement')
            ->whereDate('created_at', Carbon::today())
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        // =========================
        // MINGGUAN (7 hari terakhir)
        // =========================
        $mingguan = Transaksi::select(
            DB::raw('DATE(created_at) as label'),
            DB::raw('SUM(total_bayar) as total')
        )
            ->where('payment_status', 'settlement')
            ->whereBetween('created_at', [
                Carbon::now()->subDays(6)->startOfDay(),
                Carbon::now()->endOfDay()
            ])
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        // =========================
        // BULANAN (tahun ini)
        // =========================
        $bulanan = Transaksi::select(
            DB::raw('MONTH(created_at) as label'),
            DB::raw('SUM(total_bayar) as total')
        )
            ->where('payment_status', 'settlement')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        /////////////Card 2
        $wisatatotal = wisatamodels::count();
        $kategoritotal = KategoriModel::count();
        $testimonitotal = testimonimodel::count();

        return view('admin.beranda', compact(
            'totalPembelianTiket',
            'pendapatanHariIni',
            'harian',
            'mingguan',
            'bulanan',
            'wisatatotal',
            'kategoritotal',
            'testimonitotal'
        ));
    }

    // =========================
    // TAMPILKAN DATA WISATA
    // =========================
    public function wisata()
    {
        // eager loading relasi kategori (STRING RELATION)
        $wisata = wisatamodels::with('kategori')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.wisata.wisata', compact('wisata'));
    }

    // =========================
    // FORM TAMBAH WISATA
    // =========================
    public function tambahwisata()
    {

        // ambil kategori untuk dropdown
        $kategori = KategoriModel::orderBy('kategori')->get();

        return view('admin.wisata.tambahwisata', compact('kategori'));
    }

    // =========================
    // INSERT WISATA
    // =========================
    public function insertwisata(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_wisata'      => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'harga_tiket'      => 'required',
            'kategori_wisata'  => 'required',
            'jam_buka'         => 'nullable|string',
            'jam_tutup'        => 'nullable|string',
            'fasilitas'        => 'nullable|string',
            'latitude'         => 'nullable|numeric',
            'longitude'        => 'nullable|numeric',
            'foto_wisata'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('foto_wisata')) {
            $validatedData['foto_wisata'] = $request->file('foto_wisata')
                ->store('wisata', 'public');
        }

        wisatamodels::create($validatedData);

        return redirect()->route('admin.wisata')
            ->with('success', 'Wisata berhasil ditambahkan!');
    }

    // =========================
    // FORM EDIT WISATA
    // =========================
    public function editwisata($id)
    {
        $wisata   = wisatamodels::findOrFail($id);
        $kategori = KategoriModel::orderBy('kategori')->get();

        return view('admin.wisata.editwisata', compact('wisata', 'kategori'));
    }

    // =========================
    // UPDATE WISATA
    // =========================
    public function updatewisata(Request $request, $id)
    {
        $wisata = wisatamodels::findOrFail($id);

        $validatedData = $request->validate([
            'nama_wisata'      => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'harga_tiket'      => 'required',
            'kategori_wisata'  => 'required',
            'jam_buka'         => 'nullable|string',
            'jam_tutup'        => 'nullable|string',
            'fasilitas'        => 'nullable|string',
            'latitude'         => 'nullable|numeric',
            'longitude'        => 'nullable|numeric',
            'foto_wisata'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika upload foto baru
        if ($request->hasFile('foto_wisata')) {
            if ($wisata->foto_wisata) {
                Storage::disk('public')->delete($wisata->foto_wisata);
            }

            $validatedData['foto_wisata'] = $request->file('foto_wisata')
                ->store('wisata', 'public');
        }

        $wisata->update($validatedData);

        return redirect()->route('admin.wisata')
            ->with('success', 'Wisata berhasil diperbarui!');
    }

    // =========================
    // HAPUS WISATA
    // =========================
    public function hapuswisata($id)
    {
        $wisata = wisatamodels::findOrFail($id);

        if ($wisata->foto_wisata) {
            Storage::disk('public')->delete($wisata->foto_wisata);
        }

        $wisata->delete();

        return redirect()->route('admin.wisata')
            ->with('success', 'Wisata berhasil dihapus!');
    }
}
