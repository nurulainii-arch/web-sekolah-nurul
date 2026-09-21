<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class PublicJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->get();
        return view('jurusan', compact('jurusans'));
    }
}