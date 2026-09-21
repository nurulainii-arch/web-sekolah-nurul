@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Konsentrasi Keahlian</h1>
        <p class="mt-3 text-slate-500 max-w-2xl mx-auto text-sm">
            Pilihan jurusan unggulan di SMK Negeri 1 Cijati untuk mencetak lulusan yang siap kerja dan berdaya saing tinggi.
        </p>
    </div>

    <!-- Grid Card Jurusan Dinamis -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
       @forelse($jurusans as $jurusan)
    <div class="relative overflow-hidden rounded-3xl bg-cover bg-center shadow-xl border border-slate-800 transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/50"
         style="background-image: url('{{ $jurusan->gambar_sampul ? asset('images/jurusans/' . $jurusan->gambar_sampul) : asset('images/jurusans/default-bg.jpg') }}');">

        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-950/70 to-slate-950/95"></div>

        <div class="relative z-10 p-6 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 rounded-full border-2 border-amber-400 bg-slate-900 overflow-hidden shadow-md flex items-center justify-center">
                        @if($jurusan->gambar)
                            <img src="{{ asset('images/jurusans/' . $jurusan->gambar) }}" alt="Logo {{ $jurusan->singkatan }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-xs font-bold text-amber-400">{{ $jurusan->singkatan }}</span>
                        @endif
                    </div>
                    @if(isset($jurusan->instagram))
                        <a href="{{ $jurusan->instagram }}" target="_blank"
                           class="w-9 h-9 rounded-full bg-slate-900/80 hover:bg-amber-400 hover:text-slate-950 text-slate-300 flex items-center justify-center border border-slate-700 transition">
                            <i class="fa-brands fa-instagram text-base"></i>
                        </a>
                    @endif
                </div>

                <h3 class="text-xl font-bold text-white mb-2 drop-shadow-md">
                    {{ $jurusan->nama_jurusan }} @if($jurusan->singkatan) / {{ $jurusan->singkatan }} @endif
                </h3>
                <p class="text-slate-200 text-xs leading-relaxed mb-6 drop-shadow-sm">
                    {{ $jurusan->deskripsi }}
                </p>
            </div>

            <div class="pt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-amber-400 font-semibold">
                <span>Peluang Kerja: {{ $jurusan->peluang_kerja ?? 'Berbagai Bidang Industri' }}</span>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-12 text-slate-500">
        Belum ada data jurusan di database.
    </div>
@endforelse
    </div>
</div>
@endsection