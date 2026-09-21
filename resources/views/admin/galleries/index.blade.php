@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Galeri Foto</h1>
            <p class="text-sm text-slate-500">Kelola dokumentasi foto kegiatan sekolah</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            + Tambah Foto
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse ($galeris as $galeri)
                <div class="border rounded-lg overflow-hidden bg-slate-50">
                    @if ($galeri->foto)
                        <img src="{{ asset('images/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                             class="h-40 w-full object-cover">
                    @else
                        <div class="h-40 bg-slate-200 flex items-center justify-center text-slate-400">
                            <span>Tanpa Foto</span>
                        </div>
                    @endif
                    <div class="p-3 flex justify-between items-center">
                        <span class="text-sm font-medium text-slate-700">{{ $galeri->judul }}</span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.galleries.edit', $galeri->id) }}"
                               class="text-amber-500 text-xs hover:underline">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $galeri->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus foto ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-xs hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-slate-400">
                    Belum ada foto galeri yang ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection