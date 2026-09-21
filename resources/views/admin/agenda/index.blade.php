@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Agenda Sekolah</h1>
            <p class="text-sm text-slate-500">Kelola jadwal kegiatan yang tampil di halaman beranda</p>
        </div>
        <a href="{{ route('admin.agenda.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition flex items-center gap-2 shadow-sm">
            <span>+</span> Tambah Agenda
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 text-slate-500 text-sm font-semibold">
                        <th class="py-4 px-6">Judul Kegiatan</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($agendas as $item)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-medium text-slate-800">{{ $item->judul }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-md text-xs font-semibold">
                                    {{ $item->tanggal->translatedFormat('d M Y') }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-500 max-w-sm truncate">{{ $item->deskripsi }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.agenda.edit', $item->id) }}" class="text-amber-500 hover:text-amber-600 text-xs font-semibold">Edit</a>
                                    <form action="{{ route('admin.agenda.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400">Belum ada agenda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $agendas->links() }}
    </div>
</div>
@endsection