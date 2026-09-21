@extends('layouts.public')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Profil Sekolah</span>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900 mt-1">Akreditasi Sekolah</h1>
        <p class="text-slate-500 mt-2">{{ $setting->school_name ?? '' }}</p>
    </div>

    <div class="relative rounded-3xl p-8 md:p-12 bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800 border border-slate-800/80 shadow-xl overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-amber-400/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
            <div class="shrink-0 w-32 h-32 rounded-2xl bg-amber-400 flex items-center justify-center text-slate-950 text-5xl font-black shadow-2xl">
                {{ $setting->nilai_akreditasi ?? '-' }}
            </div>
            <div class="text-center md:text-left space-y-2">
                <h2 class="text-2xl font-black text-white">Terakreditasi {{ $setting->nilai_akreditasi ?? '-' }}</h2>
                @if(!empty($setting->no_sk_akreditasi))
                    <p class="text-slate-300 text-sm">No. SK: {{ $setting->no_sk_akreditasi }}</p>
                @endif
                @if(!empty($setting->tanggal_akreditasi))
                    <p class="text-slate-300 text-sm">Tanggal: {{ \Carbon\Carbon::parse($setting->tanggal_akreditasi)->translatedFormat('d F Y') }}</p>
                @endif
                @if(!empty($setting->file_akreditasi))
                    <a href="{{ asset('storage/' . $setting->file_akreditasi) }}" target="_blank"
                       class="inline-flex items-center gap-2 mt-3 px-4 py-2 bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold rounded-xl transition">
                        <i class="fa-solid fa-file-lines"></i> Lihat Sertifikat
                    </a>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection