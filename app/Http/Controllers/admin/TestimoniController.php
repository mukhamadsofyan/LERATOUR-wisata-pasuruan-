<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\testimonimodel;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    // =========================
    // ADMIN - LIST TESTIMONI
    // =========================
    public function admintestimonial()
    {
        $testimonial = testimonimodel::orderBy('id', 'desc')->paginate(10);
        return view('admin.testimonial.testimoni', compact('testimonial'));
    }

    // =========================
    // USER - FORM INPUT
    // =========================
    public function createstimonialte()
    {
        return view('admin.testimonial.formtestimoni');
    }

    public function succestestimonial()
    {
        return view('admin.testimonial.afterform');
    }

    // =========================
    // USER - SIMPAN TESTIMONI
    // =========================
    public function storetestimoni(Request $request)
{
    $testimonial = new TestimoniModel();
    $testimonial->nama = $request->nama;
    $testimonial->notelp = $request->notelp ?? $request->nomor_telepone;
    $testimonial->keterangan = $request->keterangan;
    $testimonial->deskripsi_testimoni = $request->deskripsi_testimoni;
    $testimonial->status = 'tunggu';

    // UPLOAD FOTO PAKAI STORAGE
    if ($request->hasFile('foto_testimoni')) {
        $file = $request->file('foto_testimoni');

        // nama file unik
        $filename = time() . '_' . $file->getClientOriginalName();

        // simpan ke storage/app/public/testimoni
        $file->storeAs('testimoni', $filename, 'public');

        $testimonial->foto_testimoni = $filename;
    }

    $testimonial->save();

     return redirect()->route('testimonial.succes')
            ->with('success', 'Testimoni berhasil Dikirim');
}

    // =========================
    // ADMIN - TERIMA TESTIMONI
    // =========================
    public function accept($id)
    {
        $testimonial = TestimoniModel::findOrFail($id);
        $testimonial->status = 'terima';
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil diterima');
    }

    // =========================
    // ADMIN - TOLAK TESTIMONI
    // =========================
    public function reject($id)
    {
        $testimonial = TestimoniModel::findOrFail($id);
        $testimonial->status = 'tolak';
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil ditolak');
    }

    // =========================
    // ADMIN - HAPUS TESTIMONI
    // =========================
    public function delete($id)
    {
        $testimonial = TestimoniModel::findOrFail($id);

        if (
            $testimonial->foto_testimoni &&
            file_exists(base_path('../public_html/Testimonial/' . $testimonial->foto_testimoni))
        ) {
            unlink(base_path('../public_html/Testimonial/' . $testimonial->foto_testimoni));
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil dihapus');
    }
}
