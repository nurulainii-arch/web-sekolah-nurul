@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Prestasi Siswa</h1>
        <p class="mt-3 text-slate-500 max-w-2xl mx-auto text-sm">
            Catatan kebanggaan dan raihan prestasi siswa-siswi SMK Negeri 1 Cijati di berbagai bidang akademik dan non-akademik.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($prestasis as $item)
            <div class="relative overflow-hidden rounded-3xl bg-slate-950 shadow-xl border border-slate-800 transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/50 min-h-[420px]">

                <div class="absolute inset-0 bg-cover bg-center opacity-40"
                    style="background-image: url('{{ $item->gambar_sampul ? asset('images/prestasi/' . $item->gambar_sampul) : asset('images/prestasi/default-bg.jpg') }}');"></div>

                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-950/60 to-slate-950"></div>

                <div class="relative z-10 p-6 flex flex-col justify-end h-full">
                    <div>
                        <div class="w-12 h-12 rounded-full border border-amber-400/50 bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 shadow-md">
                            <i class="fa-solid {{ $item->icon ?? 'fa-trophy' }} text-lg"></i>
                        </div>

                        <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest block mb-1">
                            {{ $item->kategori }}
                        </span>
                        <h3 class="text-lg font-bold text-white mb-2 drop-shadow-md">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-slate-200 text-xs leading-relaxed mb-6 drop-shadow-sm">
                            {{ $item->deskripsi }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-700/60 text-xs text-slate-300 flex items-center gap-2">
                        <i class="fa-regular fa-calendar text-amber-400"></i>
                        <span>{{ $item->tanggal->translatedFormat('F Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-500">
                Belum ada data prestasi yang dipublikasikan.
            </div>
        @endforelse
    </div>
</div>
@endsection