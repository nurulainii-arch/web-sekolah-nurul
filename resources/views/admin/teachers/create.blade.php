@extends('layouts.admin')

@section('title', 'Tambah Guru')
@section('page_title', 'Tambah Data Guru')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar</label>
            <input type="text" name="nama_guru" value="{{ old('nama_guru') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('nama_guru') border-red-500 @enderror">
            @error('nama_guru') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">NIP</label>
            <input type="text" name="nip" value="{{ old('nip') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('nip') border-red-500 @enderror">
            @error('nip') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan') }}" placeholder="cth: Guru Mata Pelajaran" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('jabatan') border-red-500 @enderror">
                @error('jabatan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Mata Pelajaran</label>
                <input type="text" name="mapel" value="{{ old('mapel') }}" placeholder="cth: Matematika" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('mapel') border-red-500 @enderror">
                @error('mapel') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Jurusan</label>
    <select name="jurusan_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none bg-white @error('jurusan_id') border-red-500 @enderror">
        <option value="">-- Tidak terikat jurusan (Guru Mapel / Staf TU) --</option>
        @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                {{ $jurusan->nama_jurusan }} ({{ $jurusan->singkatan }})
            </option>
        @endforeach
    </select>
    @error('jurusan_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
    <select name="kategori" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none bg-white @error('kategori') border-red-500 @enderror">
        <option value="kejuruan" {{ old('kategori') == 'kejuruan' ? 'selected' : '' }}>Guru Kejuruan (terikat jurusan)</option>
        <option value="mapel" {{ old('kategori') == 'mapel' ? 'selected' : '' }}>Guru Mata Pelajaran Umum</option>
        <option value="tu" {{ old('kategori') == 'tu' ? 'selected' : '' }}>Staf Tata Usaha</option>
    </select>
    @error('kategori') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
</div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Guru</label>
            <input type="file" name="foto" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none @error('foto') border-red-500 @enderror">
            @error('foto') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-5 rounded-xl transition text-sm">
                Simpan Guru
            </button>
            <a href="{{ route('admin.teachers.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium py-2.5 px-5 rounded-xl transition text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection