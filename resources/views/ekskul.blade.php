@extends('layouts.public')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen text-slate-800">
    <div class="container mx-auto px-4">

        <div class="text-center max-w-2xl mx-auto mb-12">
            <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Ekstrakurikuler</h1>
            <p class="mt-3 text-slate-600 text-sm sm:text-base">Wadah kreativitas, minat, dan bakat siswa SMK Negeri 1 Cijati</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($ekstrakurikulers as $ekskul)
                <div class="relative overflow-hidden rounded-2xl bg-slate-900 border border-slate-800 flex flex-col justify-between p-6 text-center group shadow-lg hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl">

                    @if ($ekskul->gambar_sampul)
                        <div class="absolute inset-0 bg-cover bg-center opacity-60 group-hover:opacity-75 transition-opacity duration-300"
                        style="background-image: url('{{ asset('images/ekskul/'.$ekskul->gambar_sampul) }}');"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/20 via-slate-900/50 to-slate-900/90"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-20 h-20 rounded-full bg-white p-1 shadow-md mb-4 flex items-center justify-center overflow-hidden border-2 border-amber-400">
                            <img src="{{ $ekskul->logo ? asset('images/ekskul/'.$ekskul->logo) : 'https://via.placeholder.com/150?text='.urlencode($ekskul->nama_ekskul) }}"
                                 alt="{{ $ekskul->nama_ekskul }}" class="w-full h-full object-cover rounded-full">
                        </div>

                        <h3 class="text-xl font-bold text-white mb-2 drop-shadow-md">{{ $ekskul->nama_ekskul }}</h3>
                        <p class="text-sm text-slate-200 mb-6 leading-relaxed drop-shadow-sm">{{ $ekskul->deskripsi }}</p>

                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-800/90 border border-slate-700 text-amber-400 text-xs font-medium mb-2">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                            <span>{{ $ekskul->guru->nama_guru ?? $ekskul->pembina }}</span>
                        </div>
                    </div>

                    <div class="relative z-10">
                        <a href="#" class="block w-full py-2.5 bg-slate-800/80 group-hover:bg-amber-500 group-hover:text-slate-900 text-white font-medium text-sm rounded-xl transition duration-200 border border-slate-700/50">Selengkapnya &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection