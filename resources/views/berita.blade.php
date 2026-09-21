@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Kabar Terbaru</span>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-1">Artikel &amp; Berita</h1>
        <p class="text-slate-500 mt-2">Semua kabar dan dokumentasi kegiatan sekolah kami.</p>
    </div>

    @if($artikels->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($artikels as $artikel)
                <div class="group bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-slate-700">
                    <div class="relative h-48 w-full overflow-hidden bg-slate-800">
                        @if($artikel->gambar)
                            <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80"></div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-amber-400/20 backdrop-blur-md border border-amber-400/40 text-amber-400 text-xs font-bold rounded-full">
                            Berita
                        </span>
                        <span class="absolute bottom-4 right-4 flex items-center gap-1 text-xs font-bold text-white/90">
                            <i class="fa-regular fa-calendar"></i> {{ $artikel->created_at->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">{{ $artikel->judul }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($artikel->konten), 120) }}
                        </p>
                    </div>
                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('berita.show', $artikel->slug) }}" class="inline-flex items-center justify-between w-full px-4 py-2.5 bg-slate-800/80 hover:bg-amber-400 text-slate-300 hover:text-slate-950 text-xs font-bold rounded-xl transition-all duration-300 group/btn">
                            <span>Baca Selengkapnya</span>
                            <i class="fa-solid fa-arrow-right transition-transform group-hover/btn:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $artikels->links() }}
        </div>
    @else
        <p class="text-center text-slate-400 italic">Belum ada berita yang ditambahkan.</p>
    @endif

</div>
@endsection