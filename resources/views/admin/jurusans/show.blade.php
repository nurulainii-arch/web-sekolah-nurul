@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Jurusan</h2>

    <div class="card">
        <div class="card-body">
            @if($jurusan->gambar)
                <div class="mb-3">
                    <img src="{{ asset('images/jurusans/' . $jurusan->gambar) }}" width="200" class="img-thumbnail">
                </div>
            @endif
            <h4 class="card-title">{{ $jurusan->nama_jurusan }} ({{ $jurusan->singkatan }})</h4>
            <p class="card-text"><strong>Deskripsi:</strong></p>
            <p>{{ $jurusan->deskripsi }}</p>

            <a href="{{ route('admin.jurusans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection