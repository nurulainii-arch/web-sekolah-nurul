<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seragam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SeragamController extends Controller
{
    public function index()
    {
        $seragam = Seragam::latest()->get();

        return view('admin.seragam.index', compact('seragam'));
    }

    public function create()
    {
        return view('admin.seragam.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'hari' => 'nullable|string|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/seragam'), $filename);
        $validated['gambar'] = $filename;

        Seragam::create($validated);

        return redirect()->route('admin.seragam.index')->with('success', 'Data seragam berhasil ditambahkan!');
    }

    public function edit(Seragam $seragam)
    {
        return view('admin.seragam.edit', compact('seragam'));
    }

    public function update(Request $request, Seragam $seragam)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'hari' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            if ($seragam->gambar && File::exists(public_path('images/seragam/' . $seragam->gambar))) {
                File::delete(public_path('images/seragam/' . $seragam->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/seragam'), $filename);
            $validated['gambar'] = $filename;
        }

        $seragam->update($validated);

        return redirect()->route('admin.seragam.index')->with('success', 'Data seragam berhasil diperbarui!');
    }

    public function destroy(Seragam $seragam)
    {
        if ($seragam->gambar && File::exists(public_path('images/seragam/' . $seragam->gambar))) {
            File::delete(public_path('images/seragam/' . $seragam->gambar));
        }

        $seragam->delete();

        return back()->with('success', 'Data seragam berhasil dihapus!');
    }
}