@extends('layouts.admin')

@section('title', 'Tambah Seragam')
@section('page_title', 'Tambah Seragam Baru')

@section('content')
<form action="{{ route('admin.seragam.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4 max-w-xl">
    @csrf

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Seragam</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Contoh: Seragam Putih Abu-abu"
               class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
        @error('nama') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Hari</label>
        <select name="hari" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            <option value="">- Pilih Hari -</option>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Seragam</label>
        <input type="file" name="gambar" required class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
        @error('gambar') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Keterangan (opsional)</label>
        <textarea name="keterangan" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('keterangan') }}</textarea>
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-xl transition shadow-md">
            Simpan
        </button>
        <a href="{{ route('admin.seragam.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-2.5 px-6 rounded-xl transition">
            Batal
        </a>
    </div>
</form>
@endsection