@extends('layouts.public')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-wide uppercase">
            Guru Kejuruan <span class="text-amber-500">{{ $jurusan->singkatan }}</span>
        </h1>
        <p class="text-slate-600 mt-2 font-medium">
            Mengenal lebih dekat para pendidik {{ $jurusan->nama_jurusan }}.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
        @foreach ($teachers as $teacher)
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 text-center shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:border-amber-400/50 flex flex-col items-center justify-between">
                <div class="flex flex-col items-center w-full">
                    <div class="w-24 h-24 mb-4 rounded-full border-2 border-amber-400 bg-slate-800 overflow-hidden shadow-md">
                        <img src="{{ $teacher->foto ? asset('storage/'.$teacher->foto) : asset('images/default-avatar.png') }}"
                             alt="{{ $teacher->nama_guru }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-base font-bold text-white mb-1">{{ $teacher->nama_guru }}</h3>
                    <p class="text-amber-400 text-xs font-semibold mb-2">{{ $teacher->jabatan ?? 'Guru' }}</p>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">{{ $teacher->deskripsi }}</p>
                </div>
                <span class="px-4 py-1.5 bg-slate-800/80 text-slate-300 text-xs font-medium rounded-full border border-slate-700">
                    Produktif {{ $jurusan->singkatan }}
                </span>
            </div>
        @endforeach
    </div>
</div>
@endsection