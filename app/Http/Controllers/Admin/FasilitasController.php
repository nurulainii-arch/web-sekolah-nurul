<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/fasilitas'), $imageName);
            $data['gambar'] = $imageName;
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit(Fasilitas $fasilita)
    {
        return view('admin.fasilitas.edit', ['fasilitas' => $fasilita]);
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($fasilita->gambar && File::exists(public_path('images/fasilitas/' . $fasilita->gambar))) {
                File::delete(public_path('images/fasilitas/' . $fasilita->gambar));
            }

            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/fasilitas'), $imageName);
            $data['gambar'] = $imageName;
        }

        $fasilita->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroy(Fasilitas $fasilita)
    {
        if ($fasilita->gambar && File::exists(public_path('images/fasilitas/' . $fasilita->gambar))) {
            File::delete(public_path('images/fasilitas/' . $fasilita->gambar));
        }

        $fasilita->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}