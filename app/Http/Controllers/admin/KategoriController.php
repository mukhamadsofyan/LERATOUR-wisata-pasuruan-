<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // ================= INDEX =================
    public function kategori()
    {
        $kategori = KategoriModel::withCount('wisatas')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.kategori.kategori', compact('kategori'));
    }

    // ================= CREATE =================
    public function tambahkategori()
    {
        return view('admin.kategori.tambahkategori');
    }

    // ================= STORE =================
    public function insertkategori(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255'
        ]);

        KategoriModel::create([
            'kategori' => $request->kategori
        ]);

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // ================= EDIT =================
    public function editkategori($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('admin.kategori.editkategori', compact('kategori'));
    }

    // ================= UPDATE =================
    public function updatekategori(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255'
        ]);

        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori' => $request->kategori
        ]);

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $kategori = KategoriModel::withCount('wisatas')->findOrFail($id);

        if ($kategori->wisatas_count > 0) {
            return redirect()->route('admin.kategori')
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh wisata.');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
