@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8">

    <div class="text-center max-w-2xl mx-auto mb-4">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Profil Sekolah</span>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-1">Sejarah Singkat</h1>
        <p class="text-slate-500 mt-2">{{ $setting->school_name ?? '' }}</p>
    </div>

    <div class="relative rounded-3xl p-8 md:p-12 bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800 border border-slate-800/80 shadow-xl overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-amber-400/5 rounded-full blur-3xl pointer-events-none"></div>

        @if($setting && $setting->history)
            <div class="relative z-10 text-slate-300 text-sm md:text-base leading-relaxed space-y-4">
                {!! nl2br(e($setting->history)) !!}
            </div>
        @else
            <p class="relative z-10 text-slate-400 italic text-center">
                Sejarah sekolah belum tersedia. Silakan lengkapi melalui halaman pengaturan admin.
            </p>
        @endif
    </div>

        <!-- Organisasi Sekolah -->
    <div class="pt-8">
        <div class="text-center max-w-xl mx-auto mb-8">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Struktur</span>
            <h2 class="text-2xl md:text-3xl font-black text-slate-900 mt-1">Organisasi Sekolah</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($organisasi as $item)
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 text-center shadow-lg hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-20 h-20 mx-auto mb-3 rounded-2xl bg-slate-800 border-2 border-amber-400/60 overflow-hidden flex items-center justify-center text-slate-500">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-2xl text-amber-400"></i>
                        @endif
                    </div>
                    <h3 class="text-sm font-bold text-white">{{ $item->nama ?? '-' }}</h3>
                    <p class="text-[11px] text-amber-400 font-semibold mt-1">{{ $item->jabatan }}</p>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection