@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Artikel</h1>
            <p class="text-sm text-slate-500">Kelola berita dan artikel yang tampil di beranda</p>
        </div>
        <a href="{{ route('admin.artikel.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition flex items-center gap-2 shadow-sm">
            <span>+</span> Tambah Artikel
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
                        <th class="py-4 px-6 w-20">Gambar</th>
                        <th class="py-4 px-6">Judul Artikel</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Views</th>
                        <th class="py-4 px-6 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($artikels as $artikel)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6">
                                @if ($artikel->gambar)
                                    <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                                         class="w-14 h-14 rounded-lg object-cover border border-slate-200">
                                @else
                                    <div class="w-14 h-14 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-medium text-slate-800 max-w-xs">
                                {{ $artikel->judul }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-md text-xs font-semibold">
                                    {{ $artikel->kategori->nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if ($artikel->published)
                                    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-md text-xs font-semibold">Published</span>
                                @else
                                    <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-md text-xs font-semibold">Draft</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-slate-500">
                                {{ $artikel->views }}x
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="text-amber-500 hover:text-amber-600 transition" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?');" class="inline">
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
                            <td colspan="6" class="py-8 text-center text-slate-400">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $artikels->links() }}
    </div>
</div>
@endsection