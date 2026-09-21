@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark mb-0">Tambah Kategori Artikel</h4>
                <a href="{{ route('admin.artikel-kategori.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.artikel-kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori"
                           class="form-control rounded-3"
                           value="{{ old('nama_kategori') }}" required>
                </div>

                <div class="mb-3">
                    <label for="ikon" class="form-label fw-semibold">Ikon (opsional)</label>
                    <input type="text" name="ikon" id="ikon"
                           class="form-control rounded-3"
                           placeholder="contoh: fas fa-book"
                           value="{{ old('ikon') }}">
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi (opsional)</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="form-control rounded-3">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </form>

        </div>
    </div>
</div>
@endsection