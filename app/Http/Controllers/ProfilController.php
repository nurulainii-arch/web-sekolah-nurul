<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use App\Models\StrukturOrganisasi;
use App\Models\Galeri;

class ProfilController extends Controller
{
    public function sejarah()
{
    $setting = SchoolSetting::first();
    $organisasi = StrukturOrganisasi::orderBy('urutan')->get();

    return view('profil.sejarah', compact('setting', 'organisasi'));
}

    public function galeri()
    {
        $galeri = Galeri::latest('tanggal')->paginate(9);

        return view('profil.galeri', compact('galeri'));
    }

    public function akreditasi()
    {
        $setting = SchoolSetting::first();

        return view('profil.akreditasi', compact('setting'));
    }
}