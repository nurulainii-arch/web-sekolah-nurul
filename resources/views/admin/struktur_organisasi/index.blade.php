@extends('layouts.admin')

@section('title', 'Organisasi Sekolah')
@section('page_title', 'Struktur Organisasi Sekolah')

@section('content')
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl text-sm font-medium">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.struktur-organisasi.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($data as $item)
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <h3 class="text-sm font-bold text-slate-800">{{ $item->jabatan }}</h3>

                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center text-slate-400 shrink-0">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-xl"></i>
                        @endif
                    </div>
                    <div class="flex-1 space-y-2">
                        <input type="text" name="nama[{{ $item->id }}]" value="{{ old('nama.' . $item->id, $item->nama) }}"
                               placeholder="Nama lengkap"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                        <input type="file" name="foto[{{ $item->id }}]"
                               class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow-md">
        Simpan Perubahan
    </button>
</form>
@endsection