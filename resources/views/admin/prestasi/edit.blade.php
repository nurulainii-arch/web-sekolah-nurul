@extends('layouts.admin')

@section('title', 'Edit Prestasi')
@section('page_title', 'Edit Prestasi Siswa')

@section('content')
<form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
    @csrf
    @method('PUT')
    @include('admin.prestasi._form')

    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow-md">
        Simpan Perubahan
    </button>
</form>
@endsection