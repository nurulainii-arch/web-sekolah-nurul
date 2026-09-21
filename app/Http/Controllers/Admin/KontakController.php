<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::latest()->paginate(10);
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function show(int $id)
    {
        $kontak = Kontak::findOrFail($id);

        // Tandai pesan sudah dibaca otomatis saat dibuka
        if ($kontak->dibaca == 0) {
            $kontak->update(['dibaca' => 1]);
        }

        return view('admin.kontak.show', compact('kontak'));
    }

    public function destroy(int $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan kontak berhasil dihapus!');
    }
}