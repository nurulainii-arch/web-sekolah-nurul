@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <!-- Header Tabel -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Manajemen Data Jurusan</h2>
            <p class="text-xs text-slate-500">Kelola daftar konsentrasi keahlian sekolah</p>
        </div>
        <a href="#" class="px-4 py-2.5 bg-indigo-600 text-white rounded-xl text-xs font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Jurusan
        </a>
    </div>

    <!-- Tabel Data Jurusan -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-200 text-slate-500 bg-slate-50">
                    <th class="py-3 px-4 rounded-l-xl">No</th>
                    <th class="py-3 px-4">Nama Jurusan</th>
                    <th class="py-3 px-4">Deskripsi Ringkas</th>
                    <th class="py-3 px-4 text-center rounded-r-xl">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($jurusans as $index => $item)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-3.5 px-4 font-medium text-slate-600">{{ $index + 1 }}</td>
                    <td class="py-3.5 px-4 font-bold text-slate-800">{{ $item->nama ?? 'Jurusan' }}</td>
                    <td class="py-3.5 px-4 text-slate-500 text-xs">{{ Str::limit($item->deskripsi ?? '-', 50) }}</td>
                    <td class="py-3.5 px-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-semibold hover:bg-amber-200">Edit</button>
                            <button class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-semibold hover:bg-red-200">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-slate-400 text-xs">Belum ada data jurusan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection