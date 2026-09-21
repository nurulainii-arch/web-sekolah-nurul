@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Ekstrakurikuler</h2>

    <div class="card">
        <div class="card-body">
            @if($ekstrakurikuler->logo)
                <div class="mb-3">
                    <img src="{{ asset('images/ekskul/' . $ekstrakurikuler->logo) }}" width="150" class="img-thumbnail">
                </div>
            @endif
            <h4 class="card-title">{{ $ekstrakurikuler->nama_ekskul }}</h4>
            <p><strong>Pembina:</strong> {{ $ekstrakurikuler->pembina }}</p>
            <p><strong>Guru Pengampu/ID:</strong> {{ $ekstrakurikuler->guru->nama_guru ?? $ekstrakurikuler->guru_id }}</p>
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $ekstrakurikuler->deskripsi ?? 'Tidak ada deskripsi.' }}</p>

            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection