@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">

    <!-- Header Sambutan -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 rounded-2xl p-6 md:p-8 shadow-lg text-white relative overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-40 h-40 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
        <div class="relative z-10">
            <p class="text-indigo-100 text-sm font-medium">Selamat datang kembali 👋</p>
            <h1 class="text-2xl md:text-3xl font-black mt-1">{{ $setting->school_name ?? 'Admin Panel' }}</h1>
            <p class="text-indigo-100 text-sm mt-2">Kelola seluruh konten website sekolah dari satu tempat.</p>
        </div>
    </div>

    <!-- Grid Statistik Cepat -->
    <div>
        <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-3">Ringkasan Data</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 mb-3">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['guru'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Data Guru</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-500 mb-3">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['jurusan'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Jurusan</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-500 mb-3">
                    <i class="fa-solid fa-futbol"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['ekskul'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Ekstrakurikuler</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-sky-50 flex items-center justify-center text-sky-500 mb-3">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['artikel'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Artikel</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center text-rose-500 mb-3">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['pengumuman'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Pengumuman</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-violet-50 flex items-center justify-center text-violet-500 mb-3">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['agenda'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Agenda</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-pink-50 flex items-center justify-center text-pink-500 mb-3">
                    <i class="fa-solid fa-images"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['galeri'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Galeri Foto</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-500 mb-3">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $counts['fasilitas'] }}</p>
                <p class="text-xs text-slate-500 font-medium">Fasilitas</p>
            </div>

        </div>
    </div>

    <!-- Statistik Beranda + Pesan Masuk -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-slate-700">Statistik yang Tampil di Beranda</h2>
                <a href="{{ route('admin.settings.index') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Edit &rarr;</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-4 bg-slate-50 rounded-xl">
                    <p class="text-xl font-black text-slate-800">{{ $setting->jumlah_siswa ?? 0 }}</p>
                    <p class="text-[11px] text-slate-500 font-medium">Siswa</p>
                </div>
                <div class="text-center p-4 bg-slate-50 rounded-xl">
                    <p class="text-xl font-black text-slate-800">{{ $setting->jumlah_guru ?? 0 }}</p>
                    <p class="text-[11px] text-slate-500 font-medium">Guru & Staf</p>
                </div>
                <div class="text-center p-4 bg-slate-50 rounded-xl">
                    <p class="text-xl font-black text-slate-800">{{ $setting->jumlah_alumni ?? 0 }}</p>
                    <p class="text-[11px] text-slate-500 font-medium">Alumni</p>
                </div>
                <div class="text-center p-4 bg-slate-50 rounded-xl">
                    <p class="text-xl font-black text-slate-800">{{ $setting->jumlah_prestasi ?? 0 }}</p>
                    <p class="text-[11px] text-slate-500 font-medium">Prestasi</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-slate-700">Pesan Masuk</h2>
                <a href="{{ route('admin.kontak.index') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat &rarr;</a>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-rose-500 text-lg">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-800">{{ $counts['kontak'] }}</p>
                    <p class="text-xs text-slate-500">Total pesan diterima</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection