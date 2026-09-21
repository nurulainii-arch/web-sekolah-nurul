@extends('layouts.admin')

@section('title', 'Kelola Prestasi')
@section('page_title', 'Data Prestasi Siswa')

@section('content')
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl text-sm font-medium">
        {{ session('success') }}
    </div>
@endif

<div class="mb-4 flex justify-end">
    <a href="{{ route('admin.prestasi.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-xl transition shadow-md text-sm">
        + Tambah Prestasi
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600 text-left">
            <tr>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse ($prestasis as $item)
                <tr>
                    <td class="px-4 py-3 text-amber-600 font-semibold">{{ $item->kategori }}</td>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $item->judul }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $item->tanggal->translatedFormat('F Y') }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.prestasi.edit', $item) }}" class="text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-slate-400">Belum ada data prestasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $prestasis->links() }}
</div>
@endsection