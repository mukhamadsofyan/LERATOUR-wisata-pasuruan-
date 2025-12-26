<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // ================= LIST =================
    public function index()
    {
        $galeri = GaleriModel::latest()->get();
        return view('admin.galeri.galeri', compact('galeri'));
    }

    // ================= FORM TAMBAH =================
    public function tambahgaleri()
    {
        return view('admin.galeri.tambahgaleri');
    }

    // ================= INSERT =================
    public function insertgaleri(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'gambar' => 'required|array|min:1',
            'gambar.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $paths = [];

        foreach ($request->file('gambar') as $file) {
            $paths[] = $file->store('galeri', 'public');
        }

        GaleriModel::create([
            'nama_wisata' => $request->nama_wisata,
            'gambar' => $paths, // otomatis JSON
        ]);

        return redirect()->route('admin.galeri')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    // ================= FORM EDIT =================
    public function editgaleri($id)
    {
        $galeri = GaleriModel::findOrFail($id);
        return view('admin.galeri.editgaleri', compact('galeri'));
    }

    // ================= UPDATE =================
    public function updategaleri(Request $request, $id)
    {
        $galeri = GaleriModel::findOrFail($id);

        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_wisata' => $request->nama_wisata,
        ];

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            foreach ($galeri->gambar as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }

            $paths = [];
            foreach ($request->file('gambar') as $file) {
                $paths[] = $file->store('galeri', 'public');
            }

            $data['gambar'] = $paths;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    // ================= DELETE =================
    public function hapusgaleri($id)
    {
        $galeri = GaleriModel::findOrFail($id);

        foreach ($galeri->gambar as $img) {
            if (Storage::disk('public')->exists($img)) {
                Storage::disk('public')->delete($img);
            }
        }

        $galeri->delete();

        return redirect()->route('admin.galeri')
            ->with('success', 'Galeri berhasil dihapus');
    }
}
