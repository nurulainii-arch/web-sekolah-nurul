@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Ekstrakurikuler</h1>
            <p class="text-sm text-slate-500">Isi formulir di bawah untuk menambahkan kegiatan ekstrakurikuler baru.</p>
        </div>
        <a href="{{ url('/admin/ekstrakurikuler') }}" class="px-4 py-2 bg-slate-200 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-300 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <form action="{{ url('/admin/ekstrakurikuler') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" placeholder="Contoh: Pramuka, Paskibra" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none text-sm transition-all @error('nama_ekskul') border-red-500 @enderror" value="{{ old('nama_ekskul') }}" required>
                    @error('nama_ekskul')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Pembina</label>
                    <input type="text" name="pembina" placeholder="Nama Pembina / Pelatih" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none text-sm transition-all @error('pembina') border-red-500 @enderror" value="{{ old('pembina') }}">
                    @error('pembina')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @if(isset($gurus) && count($gurus) > 0)
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Pilih Guru (Opsional)</label>
                <select name="guru_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none text-sm transition-all bg-white">
                    <option value="">-- Pilih Guru --</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->nama_guru }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-slate-400 mt-1">Kosongkan jika pembina berasal dari luar sekolah (bukan guru terdaftar).</p>
            </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat kegiatan ekstrakurikuler..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none text-sm transition-all">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Logo (Ikon Bulat)</label>
                    <input type="file" name="logo" class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer @error('logo') border-red-500 @enderror">
                    @error('logo')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Gambar Sampul (Background Card)</label>
                    <input type="file" name="gambar_sampul" class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer @error('gambar_sampul') border-red-500 @enderror">
                    @error('gambar_sampul')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="{{ url('/admin/ekstrakurikuler') }}" class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold bg-indigo-600 text-white hover:bg-indigo-700 shadow-md shadow-indigo-200 transition-all">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection