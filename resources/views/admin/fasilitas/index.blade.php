@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Fasilitas Unggulan</h1>
            <p class="text-sm text-slate-500">Kelola foto & data fasilitas yang tampil di halaman beranda</p>
        </div>
        <a href="{{ route('admin.fasilitas.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition flex items-center gap-2 shadow-sm">
            <span>+</span> Tambah Fasilitas
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse ($fasilitas as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <img src="{{ asset('images/fasilitas/' . $item->gambar) }}" class="w-full h-36 object-cover">
                <div class="p-4">
                    @if ($item->kategori)
                        <span class="inline-block px-2.5 py-1 bg-amber-50 text-amber-600 rounded-md text-xs font-semibold mb-2">
                            {{ $item->kategori }}
                        </span>
                    @endif
                    <h3 class="font-semibold text-slate-800 text-sm mb-3">{{ $item->judul }}</h3>
                    <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                        <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="text-amber-500 hover:text-amber-600 text-xs font-semibold">Edit</a>
                        <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-semibold">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl shadow-sm border border-slate-100 py-10 text-center text-slate-400">
                Belum ada data fasilitas.
            </div>
        @endforelse
    </div>
</div>
@endsection