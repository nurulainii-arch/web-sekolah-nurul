<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Guru::latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.teachers.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip'       => 'required|string|max:30|unique:guru,nip',
            'mapel'     => 'required|string|max:100',
            'jabatan'   => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'jurusan_id'=> 'nullable|exists:jurusans,id',
            'kategori'  => 'nullable|in:kejuruan,mapel,tu',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('teachers', 'public');
        }

        Guru::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $teacher = Guru::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('admin.teachers.edit', compact('teacher', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip'       => 'required|string|max:30|unique:guru,nip,' . $teacher->id,
            'mapel'     => 'required|string|max:100',
            'jabatan'   => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'jurusan_id'=> 'nullable|exists:jurusans,id',
            'kategori'  => 'nullable|in:kejuruan,mapel,tu',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($teacher->foto) {
                Storage::disk('public')->delete($teacher->foto);
            }
            $validated['foto'] = $request->file('foto')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $teacher = Guru::findOrFail($id);
        if ($teacher->foto) {
            Storage::disk('public')->delete($teacher->foto);
        }
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil dihapus!');
    }
}