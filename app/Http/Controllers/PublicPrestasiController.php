<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;

class PublicPrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::orderByDesc('tanggal')->get();
        return view('prestasi', compact('prestasis'));
    }
}