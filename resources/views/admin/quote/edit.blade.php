@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Quote Footer Beranda</h1>
        <p class="text-sm text-slate-500">Kelola kutipan yang tampil di bagian bawah halaman beranda</p>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-600 rounded-lg text-sm">
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 max-w-xl">
        <form action="{{ route('admin.quote.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Isi Quote</label>
                <textarea name="isi" rows="3" required
                          class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('isi', $quote->isi ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Tokoh</label>
                <input type="text" name="tokoh" value="{{ old('tokoh', $quote->tokoh ?? '') }}" required
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl transition shadow-sm">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection