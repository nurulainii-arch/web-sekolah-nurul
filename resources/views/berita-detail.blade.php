@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-amber-500 mb-6 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke semua berita
    </a>

    @if($artikel->gambar)
        <div class="rounded-3xl overflow-hidden mb-8 shadow-xl">
            <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-auto object-cover">
        </div>
    @endif

    <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Berita</span>
    <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-2 mb-3">{{ $artikel->judul }}</h1>

    <div class="flex items-center gap-4 text-sm text-slate-400 mb-8">
        <span class="flex items-center gap-1"><i class="fa-regular fa-calendar"></i> {{ $artikel->created_at->translatedFormat('d M Y') }}</span>
        <span class="flex items-center gap-1"><i class="fa-regular fa-eye"></i> {{ $artikel->views }}x dilihat</span>
    </div>

    <div class="prose prose-slate max-w-none leading-relaxed text-slate-700">
        {!! $artikel->konten !!}
    </div>

</div>
@endsection