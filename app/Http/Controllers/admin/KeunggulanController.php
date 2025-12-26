<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\keunggulanmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeunggulanController extends Controller
{
    public function keunggulan()
    {
        $keunggulans = keunggulanmodel::all();
        return view('admin.keunggulan.keunggulan', compact('keunggulans'));
    }

    /**
     * Tampilkan halaman edit
     */
    public function editkeunggulan($id)
    {
        $keunggulan = keunggulanmodel::findOrFail($id);

        return view('admin.keunggulan.editkeunggulan', compact('keunggulan'));
    }

    /**
     * Update data keunggulan
     */
    public function updatekeunggulan(Request $request, $id)
    {
        // ================= VALIDASI =================
        $validated = $request->validate([
            'title_keunggulan'      => 'nullable|string|max:255',
            'deskripsi_keunggulan'  => 'nullable|string',
        ]);

        // ================= AMBIL DATA =================
        $keunggulan = KeunggulanModel::findOrFail($id);

        // ================= UPDATE TEKS =================
        $keunggulan->title_keunggulan     = $validated['title_keunggulan'] ?? $keunggulan->title_keunggulan;
        $keunggulan->deskripsi_keunggulan = $validated['deskripsi_keunggulan'] ?? $keunggulan->deskripsi_keunggulan;

        // ================= SIMPAN =================
        $keunggulan->save();

        return redirect()
            ->route('admin.keunggulan')
            ->with('success', 'Keunggulan berhasil diperbarui');
    }
}
