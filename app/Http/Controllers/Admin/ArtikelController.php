<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\ArtikelKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = ArtikelKategori::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|unique:artikel,judul',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,bmp|max:5120',
            'kategori_id' => 'required|integer',
            'published' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id() ?? 1; // Fallback ke ID 1 jika belum login auth
        $data['views'] = 0;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/artikel'), $filename);
            $data['gambar'] = $filename;
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Artikel $artikel)
    {
        return view('admin.artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        $kategoris = ArtikelKategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|max:255|unique:artikel,judul,' . $artikel->id,
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,bmp|max:5120',
            'kategori_id' => 'required|integer',
            'published' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && file_exists(public_path('images/artikel/' . $artikel->gambar))) {
                unlink(public_path('images/artikel/' . $artikel->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/artikel'), $filename);
            $data['gambar'] = $filename;
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar && file_exists(public_path('images/artikel/' . $artikel->gambar))) {
            unlink(public_path('images/artikel/' . $artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}