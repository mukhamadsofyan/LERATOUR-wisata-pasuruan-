<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\KategoriModel;
use App\Models\UserGalery;
use Illuminate\Http\Request;

class UserGaleryController extends Controller
{
    public function landingpage()
    {
         $galleries = Gallery::with('wisata')
            ->latest()
            ->paginate(10);

        $userGalleries = UserGalery::with('kategori')
            ->where('uploader_type', 'user')
            ->where('status', 'approved')
            ->latest()
            ->get();

        $kategoris = KategoriModel::orderBy('kategori')->get();
        return view('landingpage.galeri.galeri', compact('galleries','userGalleries','kategoris'));
    }
    /**
     * ===============================
     * PAGES → GALERI FOTO
     * ===============================
     */
    public function index()
    {
        $galleries = UserGalery::with('kategori')
            ->where('status', 'approved')
            ->latest()
            ->get();

        $kategoris = KategoriModel::orderBy('kategori')->get();

        return view('landingpage.galeri.formgaleri', compact('galleries', 'kategoris'));
    }

    /**
     * ===============================
     * UPLOAD FOTO PENGUNJUNG
     * ===============================
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'title' => 'nullable|string|max:150',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'uploader_name' => 'nullable|string|max:100',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        UserGalery::create([
            'image' => $path,
            'title' => $request->title,
            'kategori_id' => $request->kategori_id,
            'uploader_name' => $request->uploader_name ?? 'Pengunjung',
            'uploader_type' => 'user',
            'status' => 'pending',
        ]);

        return redirect()->route('gallery.success')->with('success', 'Foto berhasil diupload dan menunggu verifikasi admin.');
    }
}
