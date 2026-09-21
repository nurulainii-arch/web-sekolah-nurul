@extends('layouts.admin')

@section('title', 'Edit Data Guru')
@section('page_title', 'Edit Data Guru')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
    <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar</label>
            <input type="text" name="nama_guru" value="{{ old('nama_guru', $teacher->nama_guru) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('nama_guru') border-red-500 @enderror">
            @error('nama_guru') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $teacher->nip) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('nip') border-red-500 @enderror">
            @error('nip') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $teacher->jabatan) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('jabatan') border-red-500 @enderror">
                @error('jabatan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Mata Pelajaran</label>
                <input type="text" name="mapel" value="{{ old('mapel', $teacher->mapel) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none @error('mapel') border-red-500 @enderror">
                @error('mapel') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Jurusan</label>
    <select name="jurusan_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none bg-white @error('jurusan_id') border-red-500 @enderror">
        <option value="">-- Tidak terikat jurusan (Guru Mapel / Staf TU) --</option>
        @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $teacher->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                {{ $jurusan->nama_jurusan }} ({{ $jurusan->singkatan }})
            </option>
        @endforeach
    </select>
    @error('jurusan_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
    <select name="kategori" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none bg-white @error('kategori') border-red-500 @enderror">
        <option value="kejuruan" {{ old('kategori', $teacher->kategori) == 'kejuruan' ? 'selected' : '' }}>Guru Kejuruan (terikat jurusan)</option>
        <option value="mapel" {{ old('kategori', $teacher->kategori) == 'mapel' ? 'selected' : '' }}>Guru Mata Pelajaran Umum</option>
        <option value="tu" {{ old('kategori', $teacher->kategori) == 'tu' ? 'selected' : '' }}>Staf Tata Usaha</option>
    </select>
    @error('kategori') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
</div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('deskripsi', $teacher->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Guru</label>
            @if($teacher->foto)
                <img src="{{ asset('storage/' . $teacher->foto) }}" class="w-16 h-16 rounded-lg object-cover mb-2">
            @endif
            <input type="file" name="foto" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none @error('foto') border-red-500 @enderror">
            @error('foto') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-5 rounded-xl transition text-sm">
                Update Data
            </button>
            <a href="{{ route('admin.teachers.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium py-2.5 px-5 rounded-xl transition text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection