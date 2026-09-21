@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Guru & Tenaga Kependidikan</h1>
        <p class="mt-3 text-slate-500 max-w-2xl mx-auto text-sm">
            Mengenal lebih dekat para pendidik dan tenaga kependidikan di SMK Negeri 1 Cijati yang berdedikasi.
        </p>
    </div>

    <!-- Grid Data Guru -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Card Guru 1 -->
        <div class="bg-slate-900 rounded-2xl overflow-hidden shadow-lg border border-slate-800 text-center p-6 flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-slate-800 border-2 border-amber-400 overflow-hidden mb-4 flex items-center justify-center text-slate-500">
                <i class="fa-solid fa-user-tie text-4xl text-amber-400"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Drs. H. Ahmad Sanusi</h3>
            <p class="text-xs text-amber-400 font-semibold mb-2">Kepala Sekolah</p>
            <span class="inline-block px-3 py-1 bg-slate-800 text-slate-300 text-xs rounded-full">NIP. 19720310 199802 1 001</span>
        </div>

        <!-- Card Guru 2 -->
        <div class="bg-slate-900 rounded-2xl overflow-hidden shadow-lg border border-slate-800 text-center p-6 flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-slate-800 border-2 border-amber-400 overflow-hidden mb-4 flex items-center justify-center text-slate-500">
                <i class="fa-solid fa-user-tie text-4xl text-amber-400"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Budi San, S.Kom.</h3>
            <p class="text-xs text-amber-400 font-semibold mb-2">Kaprog RPL</p>
            <span class="inline-block px-3 py-1 bg-slate-800 text-slate-300 text-xs rounded-full">Produktif RPL</span>
        </div>

        <!-- Card Guru 3 -->
        <div class="bg-slate-900 rounded-2xl overflow-hidden shadow-lg border border-slate-800 text-center p-6 flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-slate-800 border-2 border-amber-400 overflow-hidden mb-4 flex items-center justify-center text-slate-500">
                <i class="fa-solid fa-user-tie text-4xl text-amber-400"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Siti Nurhaliza, S.T.</h3>
            <p class="text-xs text-amber-400 font-semibold mb-2">Kaprog TKJ</p>
            <span class="inline-block px-3 py-1 bg-slate-800 text-slate-300 text-xs rounded-full">Produktif TKJ</span>
        </div>

        <!-- Card Guru 4 -->
        <div class="bg-slate-900 rounded-2xl overflow-hidden shadow-lg border border-slate-800 text-center p-6 flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-slate-800 border-2 border-amber-400 overflow-hidden mb-4 flex items-center justify-center text-slate-500">
                <i class="fa-solid fa-user-tie text-4xl text-amber-400"></i>
            </div>
            <h3 class="text-lg font-bold text-white">Rina Marlina, S.Pd.</h3>
            <p class="text-xs text-amber-400 font-semibold mb-2">Guru Bahasa Inggris</p>
            <span class="inline-block px-3 py-1 bg-slate-800 text-slate-300 text-xs rounded-full">Muatan Nasional</span>
        </div>
    </div>
</div>
@endsection