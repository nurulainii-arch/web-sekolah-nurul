@php $item = $prestasi ?? null; @endphp

@if ($errors->any())
    <div class="mb-4 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-700 rounded-r-xl text-sm">
        <p class="font-semibold mb-1">Terjadi kesalahan:</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori / Peringkat</label>
        <input type="text" name="kategori" value="{{ old('kategori', $item->kategori ?? '') }}" placeholder="cth: JUARA 1 - TINGKAT KABUPATEN" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal', isset($item->tanggal) ? $item->tanggal->format('Y-m-d') : '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
    </div>
</div>

<div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Prestasi</label>
    <input type="text" name="judul" value="{{ old('judul', $item->judul ?? '') }}" placeholder="cth: LKS Web Technologies 2026" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
</div>

<div>
    <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
    <textarea name="deskripsi" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Icon FontAwesome</label>
        <select name="icon" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            @foreach(['fa-trophy' => 'Trofi', 'fa-medal' => 'Medali', 'fa-award' => 'Lencana'] as $val => $label)
                <option value="{{ $val }}" {{ old('icon', $item->icon ?? 'fa-trophy') == $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Background</label>
        <input type="file" name="gambar_sampul" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm outline-none">
        @if(!empty($item->gambar_sampul))
            <img src="{{ asset('images/prestasi/' . $item->gambar_sampul) }}" class="mt-2 h-20 rounded-lg object-cover">
        @endif
    </div>
</div>