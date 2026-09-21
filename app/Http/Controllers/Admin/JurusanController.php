<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->paginate(10);
        return view('admin.jurusans.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusans.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_jurusan'   => 'required|string|max:255',
        'singkatan'      => 'required|string|max:255',
        'deskripsi'      => 'required',
        'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar_sampul'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->except(['gambar', 'gambar_sampul']);

    if ($request->hasFile('gambar')) {
        $imageName = time() . '_logo.' . $request->gambar->extension();
        $request->gambar->move(public_path('images/jurusans'), $imageName);
        $data['gambar'] = $imageName;
    }

    if ($request->hasFile('gambar_sampul')) {
        $sampulName = time() . '_sampul.' . $request->gambar_sampul->extension();
        $request->gambar_sampul->move(public_path('images/jurusans'), $sampulName);
        $data['gambar_sampul'] = $sampulName;
    }

    Jurusan::create($data);

    return redirect()->route('admin.jurusans.index')->with('success', 'Data jurusan berhasil ditambahkan.');
}

    public function show(Jurusan $jurusan)
    {
        return view('admin.jurusans.show', compact('jurusan'));
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusans.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
{
    $request->validate([
        'nama_jurusan'   => 'required|string|max:255',
        'singkatan'      => 'required|string|max:255',
        'deskripsi'      => 'required',
        'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar_sampul'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->except(['gambar', 'gambar_sampul']);

    if ($request->hasFile('gambar')) {
        if ($jurusan->gambar && file_exists(public_path('images/jurusans/' . $jurusan->gambar))) {
            unlink(public_path('images/jurusans/' . $jurusan->gambar));
        }
        $imageName = time() . '_logo.' . $request->gambar->extension();
        $request->gambar->move(public_path('images/jurusans'), $imageName);
        $data['gambar'] = $imageName;
    }

    if ($request->hasFile('gambar_sampul')) {
        if ($jurusan->gambar_sampul && file_exists(public_path('images/jurusans/' . $jurusan->gambar_sampul))) {
            unlink(public_path('images/jurusans/' . $jurusan->gambar_sampul));
        }
        $sampulName = time() . '_sampul.' . $request->gambar_sampul->extension();
        $request->gambar_sampul->move(public_path('images/jurusans'), $sampulName);
        $data['gambar_sampul'] = $sampulName;
    }

    $jurusan->update($data);

    return redirect()->route('admin.jurusans.index')->with('success', 'Data jurusan berhasil diubah.');
}

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar && file_exists(public_path('images/jurusans/' . $jurusan->gambar))) {
            unlink(public_path('images/jurusans/' . $jurusan->gambar));
        }

        $jurusan->delete();

        return redirect()->route('admin.jurusans.index')->with('success', 'Data jurusan berhasil dihapus.');
    }
}