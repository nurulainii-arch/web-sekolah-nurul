@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Pesan Masuk (Kontak)</h1>
        <p class="text-sm text-slate-500">Pesan yang dikirim pengunjung melalui formulir kontak</p>
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
                        <th class="py-4 px-6 w-24">Status</th>
                        <th class="py-4 px-6">Pengirim</th>
                        <th class="py-4 px-6">Subjek</th>
                        <th class="py-4 px-6">Pesan</th>
                        <th class="py-4 px-6 text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse($kontaks as $item)
                        <tr class="hover:bg-slate-50/50 transition {{ $item->dibaca == 0 ? 'bg-indigo-50/30' : '' }}">
                            <td class="py-4 px-6">
                                @if($item->dibaca == 0)
                                    <span class="px-2.5 py-1 bg-rose-50 text-rose-600 rounded-md text-xs font-semibold">Baru</span>
                                @else
                                    <span class="px-2.5 py-1 bg-slate-100 text-slate-500 rounded-md text-xs font-semibold">Dibaca</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-slate-800">{{ $item->nama }}</div>
                                <div class="text-xs text-slate-400">{{ $item->email }}</div>
                            </td>
                            <td class="py-4 px-6 text-slate-600">{{ $item->subjek ?? '-' }}</td>
                            <td class="py-4 px-6 text-slate-500 max-w-sm truncate">{{ Str::limit($item->pesan, 60) }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.kontak.show', $item->id) }}" class="text-indigo-500 hover:text-indigo-600 text-xs font-semibold">Lihat</a>
                                    <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $kontaks->links() }}
    </div>
</div>
@endsection