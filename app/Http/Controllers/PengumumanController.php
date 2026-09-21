<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.pengumuman.index', compact('pengumumans'));
    }
}