<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\sliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // ================= TAMPIL DATA =================
    public function index()
    {
        $sliders = sliderModel::all();
        return view('admin.slider.slider', compact('sliders'));
    }

    // ================= FORM EDIT =================
    public function edit($id)
    {
        $slider = sliderModel::findOrFail($id);
        return view('admin.slider.editslider', compact('slider'));
    }

    // ================= UPDATE DATA =================
    public function update(Request $request, $id)
    {
        $slider = sliderModel::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi_slider' => 'required',
            'Gambar_Slider' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // jika ganti gambar
        if ($request->hasFile('Gambar_Slider')) {

            // hapus gambar lama
            if ($slider->Gambar_Slider && Storage::disk('public')->exists($slider->Gambar_Slider)) {
                Storage::disk('public')->delete($slider->Gambar_Slider);
            }

            $path = $request->file('Gambar_Slider')->store('slider', 'public');
            $slider->Gambar_Slider = $path;
        }

        $slider->title = $request->title;
        $slider->deskripsi_slider = $request->deskripsi_slider;
        $slider->save();

        return redirect()
            ->route('slider.index')
            ->with('success', 'Slider berhasil diperbarui');
    }
}
