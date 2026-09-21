<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galleries.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal'   => 'nullable|date',
            'kategori'  => 'nullable|string|max:255',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,gif,webp,bmp|max:5120',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/galeri'), $imageName);
            $data['foto'] = $imageName;
        }

        Galeri::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galleries.edit', compact('galeri'));
    }

    public function update(Request $request, int $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal'   => 'nullable|date',
            'kategori'  => 'nullable|string|max:255',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,bmp|max:5120',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($galeri->foto && file_exists(public_path('images/galeri/' . $galeri->foto))) {
                unlink(public_path('images/galeri/' . $galeri->foto));
            }

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/galeri'), $imageName);
            $data['foto'] = $imageName;
        }

        $galeri->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->foto && file_exists(public_path('images/galeri/' . $galeri->foto))) {
            unlink(public_path('images/galeri/' . $galeri->foto));
        }

        $galeri->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus!');
    }
}