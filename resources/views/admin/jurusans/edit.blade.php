@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-slate-900">Edit Jurusan</h1>
        <p class="mt-1 text-sm text-slate-500">Perbarui data jurusan {{ $jurusan->nama_jurusan }}.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <form action="{{ route('admin.jurusans.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Singkatan</label>
                <input type="text" name="singkatan" value="{{ old('singkatan', $jurusan->singkatan) }}"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Logo (Bulat)</label>

                    @if ($jurusan->gambar)
                        <div class="mb-3">
                            <img src="{{ asset('images/jurusans/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}"
                                 class="w-24 h-24 object-cover rounded-full border border-slate-200">
                        </div>
                    @endif

                    <input type="file" name="gambar" accept="image/*"
                           class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    <p class="mt-1 text-xs text-slate-400">Kosongkan jika tidak ingin mengganti logo.</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Gambar Sampul (Background)</label>

                    @if ($jurusan->gambar_sampul)
                        <div class="mb-3">
                            <img src="{{ asset('images/jurusans/' . $jurusan->gambar_sampul) }}" alt="Sampul {{ $jurusan->nama_jurusan }}"
                                 class="w-full h-24 object-cover rounded-xl border border-slate-200">
                        </div>
                    @endif

                    <input type="file" name="gambar_sampul" accept="image/*"
                           class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    <p class="mt-1 text-xs text-slate-400">Kosongkan jika tidak ingin mengganti gambar sampul.</p>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.jurusans.index') }}"
                   class="px-5 py-2.5 bg-slate-100 text-slate-700 text-sm font-semibold rounded-xl hover:bg-slate-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection