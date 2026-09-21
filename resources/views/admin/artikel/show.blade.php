@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Detail Artikel</h1>
        <a href="{{ route('admin.artikel.index') }}" class="px-4 py-2 bg-slate-100 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-200 transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        @if ($artikel->gambar)
            <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                 class="w-full h-64 object-cover">
        @endif

        <div class="p-6">
            <span class="inline-block px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-semibold rounded-full mb-3">
                {{ $artikel->published ? 'Dipublikasikan' : 'Draft' }}
            </span>

            <h2 class="text-2xl font-bold text-slate-800 mb-2">{{ $artikel->judul }}</h2>

            <p class="text-xs text-slate-400 mb-4">
                Dibuat: {{ $artikel->created_at->format('d M Y, H:i') }}
                &middot; Dilihat {{ $artikel->views }} kali
            </p>

            <div class="prose max-w-none text-slate-700 leading-relaxed">
                {!! nl2br(e($artikel->konten)) !!}
            </div>
        </div>
    </div>
</div>
@endsection