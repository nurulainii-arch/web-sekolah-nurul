<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = StrukturOrganisasi::orderBy('urutan')->get();

        return view('admin.struktur_organisasi.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama.*' => 'nullable|string|max:255',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        foreach ($request->input('nama', []) as $id => $nama) {
            $item = StrukturOrganisasi::find($id);
            if (!$item) {
                continue;
            }

            $item->nama = $nama;

            if ($request->hasFile("foto.$id")) {
                if ($item->foto) {
                    Storage::disk('public')->delete($item->foto);
                }
                $item->foto = $request->file("foto.$id")->store('organisasi', 'public');
            }

            $item->save();
        }

        return back()->with('success', 'Data organisasi sekolah berhasil diperbarui!');
    }
}