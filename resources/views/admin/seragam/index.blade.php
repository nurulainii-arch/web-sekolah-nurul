@extends('layouts.admin')

@section('title', 'Seragam Sekolah')
@section('page_title', 'Kelola Seragam Sekolah')

@section('content')
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl text-sm font-medium">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-bold text-slate-800">Daftar Seragam</h2>
    <a href="{{ route('admin.seragam.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm py-2.5 px-5 rounded-xl transition shadow-md flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Seragam
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
    @forelse($seragam as $item)
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="h-40 bg-slate-100">
                <img src="{{ asset('images/seragam/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4 space-y-2">
                @if($item->hari)
                    <span class="inline-block text-[10px] font-bold uppercase tracking-wide text-indigo-600 bg-indigo-50 px-2 py-1 rounded-lg">{{ $item->hari }}</span>
                @endif
                <h3 class="text-sm font-bold text-slate-800">{{ $item->nama }}</h3>
                <div class="flex items-center gap-2 pt-2">
                    <a href="{{ route('admin.seragam.edit', $item->id) }}" class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition">Edit</a>
                    <form action="{{ route('admin.seragam.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-xs font-semibold py-2 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 transition">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 text-slate-400">
            Belum ada data seragam.
        </div>
    @endforelse
</div>
@endsection