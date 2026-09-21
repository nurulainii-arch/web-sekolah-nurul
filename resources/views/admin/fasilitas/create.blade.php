@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Fasilitas</h1>
            <p class="text-sm text-slate-500">Isi data fasilitas baru untuk ditampilkan di beranda</p>
        </div>
        <a href="{{ route('admin.fasilitas.index') }}" class="px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 font-semibold text-sm rounded-xl transition">
            &larr; Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-600 rounded-lg text-sm">
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 max-w-xl">
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Fasilitas</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" placeholder="contoh: Laboratorium, Praktik Kejuruan, Literasi"
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto</label>
                <input type="file" name="gambar" required
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-600 file:text-xs file:font-semibold">
            </div>

            <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition shadow-sm">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection