<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\KategoriModel;
use App\Models\UserGalery;
use App\Models\Wisata;
use App\Models\wisatamodels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index()
    {
        $galleries = Gallery::with('wisata')
            ->latest()
            ->paginate(10);

        $userGalleries = UserGalery::with('kategori')
            ->where('uploader_type', 'user')
            ->latest()
            ->get();

        $kategoris = KategoriModel::orderBy('kategori')->get();

        return view('admin.galeri.galeri', compact('galleries', 'userGalleries'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        $wisatas = wisatamodels::orderBy('nama_wisata')->get();
        return view('admin.galeri.tambahgaleri', compact('wisatas'));
    }

    // ===============================
    // STORE (MULTIPLE UPLOAD)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'images'    => 'required|array',
            'images.*'  => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption'   => 'nullable|string|max:255',
        ]);

        foreach ($request->file('images') as $image) {
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('gallery', $filename, 'public');

            Gallery::create([
                'wisata_id' => $request->wisata_id,
                'image'     => $filename,
                'caption'   => $request->caption,
                'status'    => 'published',
            ]);
        }

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil diupload.');
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit(Gallery $gallery)
    {
        $wisatas = wisatamodels::orderBy('nama_wisata')->get();
        return view('admin.galeri.editgaleri', compact('gallery', 'wisatas'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption'   => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('gallery/' . $gallery->image);

            $filename = Str::uuid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('gallery', $filename, 'public');

            $gallery->image = $filename;
        }

        $gallery->update([
            'wisata_id' => $request->wisata_id,
            'caption'   => $request->caption,
        ]);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }


    // ===============================
    // DESTROY
    // ===============================
    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete('gallery/' . $gallery->image);
        $gallery->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }



    /////////////////////////////LANDINGPAGE/////////////////////////////

    public function approve(UserGalery $userGalery)
    {
        $userGalery->update(['status' => 'approved']);
        return back()->with('success', 'Foto disetujui.');
    }

    public function reject(UserGalery $userGalery)
    {
        $userGalery->update(['status' => 'rejected']);
        return back()->with('success', 'Foto ditolak.');
    }

    public function hapus(UserGalery $userGalery)
    {
        if ($userGalery->image) {
            Storage::disk('public')->delete($userGalery->image);
        }

        $userGalery->delete();
        return back()->with('success', 'Foto dihapus.');
    }
}
