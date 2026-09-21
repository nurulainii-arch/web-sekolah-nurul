<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class PublicEkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::with('guru')->get();
        return view('ekskul', compact('ekstrakurikulers'));
    }
}