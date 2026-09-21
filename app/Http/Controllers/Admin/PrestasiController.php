<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(10);
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori'      => 'required|string|max:255',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required',
            'tanggal'       => 'required|date',
            'icon'          => 'nullable|string|max:100',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['gambar_sampul']);

        if ($request->hasFile('gambar_sampul')) {
            $sampulName = time() . '_prestasi.' . $request->gambar_sampul->extension();
            $request->gambar_sampul->move(public_path('images/prestasi'), $sampulName);
            $data['gambar_sampul'] = $sampulName;
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'kategori'      => 'required|string|max:255',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required',
            'tanggal'       => 'required|date',
            'icon'          => 'nullable|string|max:100',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['gambar_sampul']);

        if ($request->hasFile('gambar_sampul')) {
            if ($prestasi->gambar_sampul && file_exists(public_path('images/prestasi/' . $prestasi->gambar_sampul))) {
                unlink(public_path('images/prestasi/' . $prestasi->gambar_sampul));
            }
            $sampulName = time() . '_prestasi.' . $request->gambar_sampul->extension();
            $request->gambar_sampul->move(public_path('images/prestasi'), $sampulName);
            $data['gambar_sampul'] = $sampulName;
        }
        
        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil diubah.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar_sampul && file_exists(public_path('images/prestasi/' . $prestasi->gambar_sampul))) {
            unlink(public_path('images/prestasi/' . $prestasi->gambar_sampul));
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }
}