@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pesan Kontak</h1>
            <p class="text-sm text-slate-500">Rincian pesan yang dikirim pengunjung</p>
        </div>
        <a href="{{ route('admin.kontak.index') }}" class="px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 font-semibold text-sm rounded-xl transition">
            &larr; Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 max-w-2xl">

        <dl class="grid grid-cols-3 gap-y-3 text-sm mb-6">
            <dt class="text-slate-400 font-medium">Nama</dt>
            <dd class="col-span-2 text-slate-800">{{ $kontak->nama }}</dd>

            <dt class="text-slate-400 font-medium">Email</dt>
            <dd class="col-span-2 text-slate-800">{{ $kontak->email }}</dd>

            <dt class="text-slate-400 font-medium">Subjek</dt>
            <dd class="col-span-2 text-slate-800">{{ $kontak->subjek ?? '-' }}</dd>

            <dt class="text-slate-400 font-medium">Tanggal</dt>
            <dd class="col-span-2 text-slate-800">{{ $kontak->created_at->format('d M Y, H:i') }}</dd>
        </dl>

        <div class="mb-6">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-2">Pesan</h3>
            <div class="p-4 bg-slate-50 rounded-xl text-sm text-slate-700 whitespace-pre-line">{{ $kontak->pesan }}</div>
        </div>

        <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 font-semibold text-sm rounded-xl transition">
                Hapus Pesan
            </button>
        </form>

    </div>
</div>
@endsection