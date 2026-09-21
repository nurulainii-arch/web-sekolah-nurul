@extends('layouts.admin')

@section('content')
<div class="p-6">
    <!-- Header Section: Judul & Tombol Tambah di Kanan -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Daftar Jurusan</h1>
        <a href="{{ route('admin.jurusans.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition flex items-center gap-2 shadow-sm">
            <span>+</span> Tambah Jurusan Baru
        </a>
    </div>

    <!-- Table Card Container -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Header -->
                <thead>
                    <tr class="border-b border-slate-100 text-slate-500 text-sm font-semibold">
                        <th class="py-4 px-6 w-24">Foto</th>
                        <th class="py-4 px-6">Nama Jurusan</th>
                        <th class="py-4 px-6">Singkatan</th>
                        <th class="py-4 px-6 text-center w-32">Aksi</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse($jurusans as $jurusan)
                        <tr class="hover:bg-slate-50/50 transition">
                            <!-- Foto -->
                            <td class="py-4 px-6">
                                @if($jurusan->gambar)
                                    <img src="{{ asset('images/jurusans/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-400 font-bold text-xs">
                                        N/A
                                    </div>
                                @endif
                            </td>

                            <!-- Nama Jurusan -->
                            <td class="py-4 px-6 font-medium text-slate-800">
                                {{ $jurusan->nama_jurusan }}
                            </td>

                            <!-- Singkatan -->
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-md text-xs font-semibold">
                                    {{ $jurusan->singkatan }}
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.jurusans.edit', $jurusan->id) }}" class="text-amber-500 hover:text-amber-600 transition" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.jurusans.destroy', $jurusan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-500 hover:text-rose-600 transition" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400">
                                Belum ada data jurusan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection