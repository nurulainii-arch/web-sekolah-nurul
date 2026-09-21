<?php

namespace App\Http\Controllers;

use App\Models\ArtikelKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelKategoriController extends Controller
{
    public function index()
    {
        $kategori = ArtikelKategori::latest()->paginate(10);
        return view('admin.artikel_kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.artikel_kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'ikon'          => 'nullable|string|max:255',
        ]);

        ArtikelKategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori),
            'deskripsi'     => $request->deskripsi,
            'ikon'          => $request->ikon,
        ]);

        return redirect()->route('admin.artikel-kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $kategori = ArtikelKategori::findOrFail($id);
        return view('admin.artikel_kategori.edit', compact('kategori'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'ikon'          => 'nullable|string|max:255',
        ]);

        $kategori = ArtikelKategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori),
            'deskripsi'     => $request->deskripsi,
            'ikon'          => $request->ikon,
        ]);

        return redirect()->route('admin.artikel-kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        $kategori = ArtikelKategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.artikel-kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}