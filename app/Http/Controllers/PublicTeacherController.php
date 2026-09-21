<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;

class PublicTeacherController extends Controller
{
    public function show(string $singkatan)
    {
        $jurusan = Jurusan::where('singkatan', $singkatan)->firstOrFail();
        $teachers = Guru::where('jurusan_id', $jurusan->id)->get();

        return view('guru.show', compact('jurusan', 'teachers'));
    }

    public function mapel()
    {
        $teachers = Guru::where('kategori', 'mapel')->get();
        return view('guru.mapel', compact('teachers'));
    }

    public function tu()
    {
        $teachers = Guru::where('kategori', 'tu')->get();
        return view('guru.tu', compact('teachers'));
    }
}