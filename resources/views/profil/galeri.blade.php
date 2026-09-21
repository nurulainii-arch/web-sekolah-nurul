@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Profil Sekolah</span>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-1">Galeri Sekolah</h1>
        <p class="text-slate-500 mt-2">Dokumentasi kegiatan dan momen di sekolah kami.</p>
    </div>

    @if($galeri->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($galeri as $item)
                <div class="group bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-slate-700">
                    <div class="relative h-48 w-full overflow-hidden bg-slate-800">
                        <img src="{{ asset('images/galeri/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80"></div>
                        @if($item->kategori)
                            <span class="absolute top-4 left-4 px-3 py-1 bg-amber-400/20 backdrop-blur-md border border-amber-400/40 text-amber-400 text-xs font-bold rounded-full">
                                {{ $item->kategori }}
                            </span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-base font-bold text-white mb-1.5">{{ $item->judul }}</h3>
                        @if($item->deskripsi)
                            <p class="text-slate-400 text-xs leading-relaxed line-clamp-2">{{ $item->deskripsi }}</p>
                        @endif
                        @if($item->tanggal)
                            <p class="text-[11px] text-amber-400 mt-3 flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $galeri->links() }}
        </div>
    @else
        <p class="text-center text-slate-400 italic">Belum ada galeri yang ditambahkan.</p>
    @endif

</div>
@endsection