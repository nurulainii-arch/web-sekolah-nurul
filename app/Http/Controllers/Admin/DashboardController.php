<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Artikel;
use App\Models\Pengumuman;
use App\Models\Agenda;
use App\Models\Galeri;
use App\Models\Fasilitas;
use App\Models\Kontak;
use App\Models\SchoolSetting;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'guru'          => Guru::count(),
            'jurusan'       => Jurusan::count(),
            'ekskul'        => Ekstrakurikuler::count(),
            'artikel'       => Artikel::count(),
            'pengumuman'    => Pengumuman::count(),
            'agenda'        => Agenda::count(),
            'galeri'        => Galeri::count(),
            'fasilitas'     => Fasilitas::count(),
            'kontak'        => Kontak::count(),
            'prestasi'      => Prestasi::count(),
        ];

        $setting = SchoolSetting::first();

        return view('admin.dashboard', compact('counts', 'setting'));
    }
}