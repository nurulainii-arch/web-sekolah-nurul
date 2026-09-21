<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::with('guru')->latest()->paginate(10);
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('admin.ekstrakurikuler.create', compact('gurus'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_ekskul'    => 'required|string|max:255',
        'pembina'        => 'nullable|string|max:255',
        'guru_id'        => 'nullable|exists:guru,id',
        'deskripsi'      => 'nullable|string',
        'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar_sampul'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->except(['logo', 'gambar_sampul']);

    if ($request->hasFile('logo')) {
        $imageName = time() . '_logo.' . $request->logo->extension();
        $request->logo->move(public_path('images/ekskul'), $imageName);
        $data['logo'] = $imageName;
    }

    if ($request->hasFile('gambar_sampul')) {
        $sampulName = time() . '_sampul.' . $request->gambar_sampul->extension();
        $request->gambar_sampul->move(public_path('images/ekskul'), $sampulName);
        $data['gambar_sampul'] = $sampulName;
    }

    Ekstrakurikuler::create($data);

    return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
}

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        $gurus = Guru::all();
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler', 'gurus'));
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
{
    $request->validate([
        'nama_ekskul'    => 'required|string|max:255',
        'pembina'        => 'nullable|string|max:255',
        'guru_id'        => 'nullable|exists:guru,id',
        'deskripsi'      => 'nullable|string',
        'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar_sampul'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->except(['logo', 'gambar_sampul']);

    if ($request->hasFile('logo')) {
        if ($ekstrakurikuler->logo && File::exists(public_path('images/ekskul/' . $ekstrakurikuler->logo))) {
            File::delete(public_path('images/ekskul/' . $ekstrakurikuler->logo));
        }
        $imageName = time() . '_logo.' . $request->logo->extension();
        $request->logo->move(public_path('images/ekskul'), $imageName);
        $data['logo'] = $imageName;
    }

    if ($request->hasFile('gambar_sampul')) {
        if ($ekstrakurikuler->gambar_sampul && File::exists(public_path('images/ekskul/' . $ekstrakurikuler->gambar_sampul))) {
            File::delete(public_path('images/ekskul/' . $ekstrakurikuler->gambar_sampul));
        }
        $sampulName = time() . '_sampul.' . $request->gambar_sampul->extension();
        $request->gambar_sampul->move(public_path('images/ekskul'), $sampulName);
        $data['gambar_sampul'] = $sampulName;
    }

    $ekstrakurikuler->update($data);

    return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
}

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->logo && File::exists(public_path('images/ekskul/' . $ekstrakurikuler->logo))) {
            File::delete(public_path('images/ekskul/' . $ekstrakurikuler->logo));
        }

        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}