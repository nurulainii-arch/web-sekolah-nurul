@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Pengumuman Sekolah</h1>
            <p class="text-sm text-slate-500">Kelola pengumuman yang tampil di halaman beranda</p>
        </div>
        <a href="{{ route('admin.pengumuman.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition flex items-center gap-2 shadow-sm">
            <span>+</span> Tambah Pengumuman
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
                        <th class="py-4 px-6">Judul</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($pengumumans as $item)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-medium text-slate-800">{{ $item->judul }}</td>
                            <td class="py-4 px-6">
                                @php
                                    $badgeColor = match($item->kategori) {
                                        'Mendesak' => 'bg-rose-50 text-rose-600',
                                        'Siaga Bencana' => 'bg-rose-50 text-rose-600',
                                        default => 'bg-amber-50 text-amber-600',
                                    };
                                @endphp
                                <span class="px-3 py-1 {{ $badgeColor }} rounded-md text-xs font-semibold">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="py-4 px-6">{{ $item->tanggal->format('d M Y') }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="text-amber-500 hover:text-amber-600 text-xs font-semibold">Edit</a>
                                    <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400">Belum ada pengumuman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $pengumumans->links() }}
    </div>
</div>
@endsection