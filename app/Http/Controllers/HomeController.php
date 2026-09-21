<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use App\Models\Guru;
use App\Models\jurusan;
use App\Models\Pengumuman;
use App\Models\Artikel;
use App\Models\Agenda;
use App\Models\Fasilitas;
use App\Models\Quote;
use App\Models\Seragam;

class HomeController extends Controller
{
    public function index()
    {
        $setting = SchoolSetting::first();
        $pengumumans = Pengumuman::orderBy('tanggal', 'desc')->take(3)->get();
        $artikels = Artikel::where('published', 1)->latest()->take(3)->get();
        $agendas = Agenda::where('tanggal', '>=', now())->orderBy('tanggal', 'asc')->take(3)->get();
        $fasilitas = Fasilitas::latest()->get();
        $quote = Quote::first();
        $seragam = Seragam::all();

        return view('home', compact('setting', 'pengumumans', 'artikels', 'agendas', 'fasilitas', 'quote' , 'seragam'));
    }

    public function guru()
    {
        $setting = SchoolSetting::first();
        $teachers = Guru::all();
        return view('guru', compact('setting', 'teachers'));
    }

    public function ekskul()
    {
        $setting = SchoolSetting::first();
        return view('ekskul', compact('setting'));
    }

    public function jurusan()
    {
        $setting = SchoolSetting::first();
        $jurusans = jurusan::all();
        return view('jurusan', compact('setting', 'jurusans'));
    }

    public function prestasi()
    {
        $setting = SchoolSetting::first();
        return view('prestasi', compact('setting'));
    }

    public function berita()
{
    $setting = SchoolSetting::first();
    $artikels = Artikel::where('published', 1)->latest()->paginate(9);
    return view('berita', compact('setting', 'artikels'));
}

public function beritaDetail(Artikel $artikel)
{
    $setting = SchoolSetting::first();
    $artikel->increment('views');
    return view('berita-detail', compact('setting', 'artikel'));
}
}