@extends('layouts.admin')

@section('content')
<div class="px-6 py-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Data Guru</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola data guru dan tenaga pendidik.</p>
        </div>
        <a href="{{ route('admin.teachers.create') }}"
           class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 transition">
            + Tambah Guru
        </a>
    </div>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Peringatan NIP Placeholder -->
    @php
        $pendingCount = $teachers->where('nip', 'like', 'TEMP-%')->count();
    @endphp
    @if ($pendingCount > 0)
        <div class="mb-6 p-4 bg-amber-50 border border-amber-200 text-amber-800 rounded-xl text-sm flex items-center gap-2">
            <span class="font-semibold">{{ $pendingCount }} guru</span>
            <span>di halaman ini masih menggunakan NIP sementara. Segera lengkapi data NIP asli sebelum website dipublikasikan.</span>
        </div>
    @endif

    <!-- Tabel Data Guru -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr class="text-left text-slate-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-3">Foto</th>
                    <th class="px-6 py-3">Nama Guru</th>
                    <th class="px-6 py-3">NIP</th>
                    <th class="px-6 py-3">Jabatan</th>
                    <th class="px-6 py-3">Mapel</th>
                    <th class="px-6 py-3">Jurusan</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($teachers as $teacher)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            @if ($teacher->foto)
                                <img src="{{ asset('storage/'.$teacher->foto) }}"
                                     class="w-10 h-10 rounded-full object-cover border border-slate-200">
                            @else
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-xs">
                                    N/A
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-900">{{ $teacher->nama_guru }}</td>
                        <td class="px-6 py-4 text-slate-600">
                            {{ $teacher->nip }}
                            @if (str_starts_with($teacher->nip, 'TEMP-'))
                                <span class="block mt-1 w-fit px-2 py-0.5 bg-amber-100 text-amber-700 text-[10px] font-semibold rounded-full">
                                    NIP Belum Lengkap
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $teacher->jabatan ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $teacher->mapel }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $teacher->jurusan->nama_jurusan ?? '-' }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                   class="px-3 py-1.5 bg-indigo-50 text-indigo-600 text-xs font-semibold rounded-lg hover:bg-indigo-100">
                                    Edit
                                </a>
                                <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus data guru ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-50 text-red-600 text-xs font-semibold rounded-lg hover:bg-red-100">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                            Belum ada data guru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $teachers->links() }}
    </div>

</div>
@endsection