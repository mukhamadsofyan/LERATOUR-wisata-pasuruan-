<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\keunggulanmodel;
use App\Models\testimonimodel;
use App\Models\wisatamodels;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // =============================
        // WISATA UTAMA
        // =============================
        $wisata = wisatamodels::latest()->get();

        // =============================
        // TRENDING WISATA (PALING BANYAK TIKET)
        // =============================
        $trendingWisata = wisatamodels::select(
            'wisatas.*',
            DB::raw('COALESCE(SUM(transaksis.jumlah_tiket), 0) as total_tiket')
        )
            ->leftJoin('transaksis', 'transaksis.nama_wisata', '=', 'wisatas.nama_wisata')
            ->groupBy(
                'wisatas.id',
                'wisatas.nama_wisata',
                'wisatas.foto_wisata',
                'wisatas.harga_tiket'
            )
            ->orderByDesc('total_tiket')
            ->limit(5)
            ->get();

        // =============================
        // TESTIMONI
        // =============================
        $testimonials = testimonimodel::where('status', 'terima')
            ->latest()
            ->get();

        // =============================
        // KEUNGGULAN
        // =============================
        $k1 = keunggulanmodel::find(1);
        $k2 = keunggulanmodel::find(2);
        $k3 = keunggulanmodel::find(3);
        $k4 = keunggulanmodel::find(4);

        return view('landingpage.home', compact(
            'wisata',
            'trendingWisata',
            'testimonials',
            'k1',
            'k2',
            'k3',
            'k4'
        ));
    }

    public function about()
    {
        $testimonials = testimonimodel::where('status', 'terima')
            ->latest()
            ->get();

        $k1 = keunggulanmodel::find(1);
        $k2 = keunggulanmodel::find(2);
        $k3 = keunggulanmodel::find(3);
        $k4 = keunggulanmodel::find(4);

        return view('landingpage.about', compact(
            'testimonials',
            'k1',
            'k2',
            'k3',
            'k4'
        ));
    }

    public function WisataList()
    {
        return view("landingpage.wisatalist");
    }
}
