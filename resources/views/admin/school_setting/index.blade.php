@extends('layouts.admin')

@section('title', 'Kelola Profil Sekolah')
@section('page_title', 'Pengaturan Profil Sekolah')

@section('content')
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl text-sm font-medium">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Informasi Umum -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b pb-3">Informasi Utama Sekolah</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Sekolah</label>
                <input type="text" name="school_name" value="{{ old('school_name', $setting->school_name ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Slogan</label>
                <input type="text" name="slogan" value="{{ old('slogan', $setting->slogan ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Background Hero (Beranda)</label>
        <input type="file" name="hero_background" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
        @if(!empty($setting->hero_background))
            <img src="{{ asset('storage/' . $setting->hero_background) }}" class="mt-2 h-20 rounded-lg object-cover">
        @endif
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Background Visi & Misi</label>
        <input type="file" name="visimisi_background" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
        @if(!empty($setting->visimisi_background))
            <img src="{{ asset('storage/' . $setting->visimisi_background) }}" class="mt-2 h-20 rounded-lg object-cover">
        @endif
    </div>
</div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Sejarah Sekolah</label>
            <textarea name="history" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('history', $setting->history ?? '') }}</textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Visi</label>
                <textarea name="vision" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('vision', $setting->vision ?? '') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Misi</label>
                <textarea name="mission" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('mission', $setting->mission ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Identitas Kepala Sekolah -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b pb-3">Profil Kepala Sekolah</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Kepala Sekolah</label>
                <input type="text" name="principal_name" value="{{ old('principal_name', $setting->principal_name ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Kepala Sekolah</label>
                <input type="file" name="principal_photo" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Sambutan Kepala Sekolah</label>
            <textarea name="principal_welcome" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('principal_welcome', $setting->principal_welcome ?? '') }}</textarea>
        </div>
    </div>

    <!-- Kontak Sekolah -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b pb-3">Kontak & Alamat</h3>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Alamat Lengkap</label>
            <textarea name="address" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('address', $setting->address ?? '') }}</textarea>
        </div>
                <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Link Embed Google Maps</label>
            <textarea name="maps_embed_url" rows="2" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('maps_embed_url', $setting->maps_embed_url ?? '') }}</textarea>
            <p class="text-xs text-slate-400 mt-1">
                Cara ambil link: buka Google Maps → cari lokasi sekolah → klik <b>Bagikan</b> → tab <b>Sematkan peta</b> → klik <b>Salin HTML</b> → tempel di sini <b>hanya bagian URL di dalam <code>src="..."</code></b> (bukan seluruh kode HTML-nya).
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">No. Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $setting->phone ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Sekolah</label>
                <input type="email" name="email" value="{{ old('email', $setting->email ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
        </div>
    </div>

        <!-- Statistik Sekolah -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b pb-3">Statistik Sekolah</h3>
        <p class="text-xs text-slate-500 -mt-2">Angka ini akan tampil di halaman beranda pada bagian statistik.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah Siswa</label>
                <input type="number" min="0" name="jumlah_siswa" value="{{ old('jumlah_siswa', $setting->jumlah_siswa ?? 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah Guru & Staf</label>
                <input type="number" min="0" name="jumlah_guru" value="{{ old('jumlah_guru', $setting->jumlah_guru ?? 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah Alumni</label>
                <input type="number" min="0" name="jumlah_alumni" value="{{ old('jumlah_alumni', $setting->jumlah_alumni ?? 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah Prestasi</label>
                <input type="number" min="0" name="jumlah_prestasi" value="{{ old('jumlah_prestasi', $setting->jumlah_prestasi ?? 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
        </div>
    </div>

        <!-- Akreditasi Sekolah -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b pb-3">Akreditasi Sekolah</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nilai Akreditasi</label>
                <select name="nilai_akreditasi" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                    <option value="">- Pilih -</option>
                    @foreach(['A', 'B', 'C', 'Belum Terakreditasi'] as $grade)
                        <option value="{{ $grade }}" {{ old('nilai_akreditasi', $setting->nilai_akreditasi ?? '') == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">No. SK Akreditasi</label>
                <input type="text" name="no_sk_akreditasi" value="{{ old('no_sk_akreditasi', $setting->no_sk_akreditasi ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Akreditasi</label>
                <input type="date" name="tanggal_akreditasi" value="{{ old('tanggal_akreditasi', $setting->tanggal_akreditasi ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Sertifikat Akreditasi (gambar/PDF)</label>
            <input type="file" name="file_akreditasi" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
            @if(!empty($setting->file_akreditasi))
                <a href="{{ asset('storage/' . $setting->file_akreditasi) }}" target="_blank" class="text-xs text-indigo-600 hover:underline mt-1 inline-block">Lihat file saat ini</a>
            @endif
        </div>
    </div>

    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow-md">
        Simpan Perubahan
    </button>
</form>
@endsection