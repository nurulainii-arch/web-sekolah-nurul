@extends('layouts.admin')

@section('title', 'Tambah Prestasi')
@section('page_title', 'Tambah Prestasi Siswa')

@section('content')
<form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
    @csrf
    @include('admin.prestasi._form')

    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow-md">
        Simpan
    </button>
</form>
@endsection