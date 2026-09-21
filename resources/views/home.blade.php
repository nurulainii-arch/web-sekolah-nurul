@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">

    <!-- Hero / Header Utama Sekolah -->
<div class="relative overflow-hidden rounded-3xl bg-cover bg-center shadow-2xl min-h-[420px] md:min-h-[520px] flex items-end"
     style="background-image: url('{{ !empty($setting->hero_background) ? asset('storage/' . $setting->hero_background) : asset('images/sekolah.jpg') }}');">

    <!-- Gradient overlay: gelap di bawah (tempat teks), cerah di atas (biar foto kelihatan) -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-transparent"></div>

    <div class="relative z-10 max-w-2xl p-8 md:p-14">
    
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-4 drop-shadow-lg">
            {{ $setting->school_name ?? 'Nama Sekolah' }}
        </h1>
        <p class="text-slate-200 text-base md:text-xl font-normal leading-relaxed drop-shadow-md">
            {{ $setting->slogan ?? '' }}
        </p>
    </div>
</div>

    <!-- 2. Sambutan Kepala Sekolah Card -->
    <div class="relative rounded-3xl p-8 md:p-10 bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800 border border-slate-800/80 shadow-xl overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-amber-400/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="flex flex-col md:flex-row items-center gap-8 relative z-10">
            <div class="relative shrink-0">
                <div class="w-36 h-36 md:w-44 md:h-44 rounded-2xl bg-slate-800 border-2 border-amber-400/80 shadow-2xl overflow-hidden flex items-center justify-center text-slate-500">
                    @if (!empty($setting->principal_photo))
                        <img src="{{ asset('storage/' . $setting->principal_photo) }}" alt="{{ $setting->principal_name }}" class="w-full h-full object-cover">
                    @else
                        <i class="fa-solid fa-user-tie text-6xl text-amber-400"></i>
                    @endif
                </div>
                <div class="absolute -bottom-2 -right-2 bg-amber-400 text-slate-950 p-2 rounded-xl shadow-lg">
                    <i class="fa-solid fa-quote-right text-xs"></i>
                </div>
            </div>
            <div class="space-y-4 text-center md:text-left">
                <span class="text-xs font-bold text-amber-400 tracking-widest uppercase flex items-center justify-center md:justify-start gap-2">
                    <i class="fa-solid fa-award"></i> Sambutan Kepala Sekolah
                </span>
                <h2 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                    {{ $setting->principal_name ?? '-' }}
                </h2>
                <p class="text-slate-300 text-sm md:text-base leading-relaxed italic">
                    "{{ $setting->principal_welcome ?? '' }}"
                </p>
            </div>
        </div>
    </div>

    <!-- Container Utama Visi & Misi dengan Foto Transparan -->
   <div class="relative overflow-hidden rounded-3xl bg-cover bg-center shadow-2xl my-12"
     style="background-image: url('{{ !empty($setting->visimisi_background) ? asset('storage/' . $setting->visimisi_background) : asset('images/sekolah.jpg') }}');">

        <div class="bg-slate-950/40 p-8 md:p-12">

            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-amber-400 flex items-center justify-center text-slate-950 font-bold">
                    <i class="fa-solid fa-compass text-lg"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-white tracking-wide uppercase">
                    VISI & MISI
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-slate-900/70 backdrop-blur-md border border-slate-800/80 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center gap-2 text-amber-400 font-bold mb-3">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3>Visi Sekolah</h3>
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        {{ $setting->vision ?? '' }}
                    </p>
                </div>

                <div class="bg-slate-900/70 backdrop-blur-md border border-slate-800/80 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center gap-2 text-amber-400 font-bold mb-3">
                        <i class="fa-solid fa-list-check"></i>
                        <h3>Misi Sekolah</h3>
                    </div>
                    <div class="text-slate-300 text-sm leading-relaxed space-y-1">
                        {!! nl2br(e($setting->mission ?? '')) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Section Artikel & Berita -->
<div class="my-12">
    <div class="flex items-end justify-between mb-8">
        <div>
            <span class="text-xs font-bold text-amber-500 uppercase tracking-widest block mb-1">
                Kabar Terbaru
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                Artikel & Berita
            </h2>
        </div>

        <a href="{{ route('berita.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 hover:bg-amber-400 text-slate-200 hover:text-slate-950 text-xs font-bold rounded-xl border border-slate-800 transition-all duration-300 shadow-md group">
            <span>Lihat Semua Berita</span>
            <i class="fa-solid fa-arrow-right text-amber-400 group-hover:text-slate-950 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($artikels as $artikel)
            <div class="group bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-xl flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-slate-700">
                <div>
                    <div class="relative h-48 w-full overflow-hidden bg-slate-800">
                        @if ($artikel->gambar)
                            <img src="{{ asset('images/artikel/' . $artikel->gambar) }}"
                                 alt="{{ $artikel->judul }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-600">
                                <i class="fa-regular fa-image text-4xl"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80"></div>

                        <span class="absolute top-4 left-4 px-3 py-1 bg-amber-400/20 backdrop-blur-md border border-amber-400/40 text-amber-400 text-xs font-bold rounded-full">
                            Berita
                        </span>
                        <span class="absolute bottom-3 right-4 text-xs font-medium text-slate-300 flex items-center gap-1">
                            <i class="fa-regular fa-calendar text-amber-400"></i> {{ $artikel->created_at->translatedFormat('d M Y') }}
                        </span>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-amber-400 transition">
                            {{ $artikel->judul }}
                        </h3>
                        <p class="text-slate-400 text-xs leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($artikel->konten), 120) }}
                        </p>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2">
                    <a href="{{ route('berita.show', $artikel->slug) }}" class="inline-flex items-center justify-between w-full px-4 py-2.5 bg-slate-800/80 hover:bg-amber-400 text-slate-300 hover:text-slate-950 text-xs font-bold rounded-xl transition-all duration-300 group/btn">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right transition-transform group-hover/btn:translate-x-1"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-400">
                Belum ada artikel yang dipublikasikan.
            </div>
        @endforelse
    </div>
</div>

    <!-- Section Pengumuman & Agenda -->
<div class="space-y-4">
    <!-- Header Pengumuman + Tombol Lihat Semua -->
    <div class="flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Info Penting</span>
            <h2 class="text-2xl font-extrabold text-slate-900 mt-0.5">Pengumuman Sekolah</h2>
        </div>
    </div>

    @forelse ($pengumumans as $item)
        @php
            $badgeColor = match($item->kategori) {
                'Mendesak' => 'bg-rose-500/20 text-rose-400 border-rose-500/30',
                'Siaga Bencana' => 'bg-rose-500/20 text-rose-400 border-rose-500/30',
                default => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
            };
        @endphp
        <div class="p-5 rounded-2xl bg-[#0f172a] text-white shadow-md">
            <span class="inline-block px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-md border mb-2 {{ $badgeColor }}">
                {{ $item->kategori }}
            </span>
            <h3 class="text-base font-bold text-white mb-1.5">{{ $item->judul }}</h3>
            <p class="text-xs text-slate-300 leading-relaxed">{{ $item->isi }}</p>
        </div>
    @empty
        <div class="p-5 rounded-2xl bg-[#0f172a] text-slate-400 text-sm text-center">
            Belum ada pengumuman.
        </div>
    @endforelse
</div>

        <!-- KOLOM KANAN: AGENDA MENDATANG -->
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Jadwal Kegiatan</span>
            <h2 class="text-2xl font-extrabold text-slate-900 mt-0.5">Agenda Mendatang</h2>
        </div>
    </div>

    @forelse ($agendas as $item)
        <div class="p-5 rounded-2xl bg-[#0f172a] text-white flex items-center gap-4 shadow-md">
            <div class="flex-shrink-0 w-14 h-14 bg-amber-500/10 border border-amber-500/30 rounded-xl flex flex-col items-center justify-center text-center">
                <span class="text-lg font-extrabold text-amber-400 leading-none">{{ $item->tanggal->format('d') }}</span>
                <span class="text-[9px] font-bold text-amber-300 uppercase mt-0.5">{{ $item->tanggal->translatedFormat('M Y') }}</span>
            </div>
            <div>
                <h3 class="text-sm font-bold text-white mb-1">{{ $item->judul }}</h3>
                @if ($item->deskripsi)
                    <p class="text-[11px] text-slate-400 leading-relaxed">{{ Str::limit($item->deskripsi, 80) }}</p>
                @endif
            </div>
        </div>
    @empty
        <div class="p-5 rounded-2xl bg-[#0f172a] text-slate-400 text-sm text-center">
            Belum ada agenda mendatang.
        </div>
    @endforelse
</div>

    <!-- SECTION FASILITAS UNGGULAN -->
    <section class="py-16 bg-slate-900 rounded-3xl my-8 overflow-hidden">
        <div class="container mx-auto px-4">

            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-amber-400">Sarana & Prasarana</span>
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl mt-1">Fasilitas Unggulan</h2>
            </div>

            @if ($fasilitas->count() > 0)
                <div class="swiper fasilitasSlider relative pb-12">
                    <div class="swiper-wrapper">
                        @foreach ($fasilitas as $item)
                            <div class="swiper-slide">
                                <div class="relative h-96 rounded-2xl overflow-hidden group border border-slate-800 shadow-xl">
                                    <img src="{{ asset('images/fasilitas/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                                    <div class="absolute bottom-0 inset-x-0 p-6 text-left">
                                        @if ($item->kategori)
                                            <span class="px-3 py-1 bg-amber-500/20 text-amber-400 border border-amber-500/30 rounded-full text-xs font-semibold mb-2 inline-block">{{ $item->kategori }}</span>
                                        @endif
                                        <h3 class="text-2xl font-bold text-white mb-1">{{ $item->judul }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            @else
                <p class="text-center text-slate-400">Belum ada data fasilitas.</p>
            @endif

        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.fasilitasSlider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });
        });
    </script>

        <!-- SECTION SERAGAM HARIAN -->
    <section class="py-16 bg-white rounded-3xl my-8 overflow-hidden border border-slate-100 shadow-sm">
        <div class="container mx-auto px-4">

            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-amber-500">Tata Tertib</span>
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl mt-1">Seragam Harian Siswa-Siswi</h2>
                <p class="text-slate-500 text-sm mt-2">Senin - Jumat, SMK Negeri 1 Cijati</p>
            </div>

            @if ($seragam->count() > 0)
                <div class="swiper seragamSlider relative pb-12">
                    <div class="swiper-wrapper">
                        @foreach ($seragam as $item)
                            <div class="swiper-slide">
                                <div class="relative h-96 rounded-2xl overflow-hidden group border border-slate-200 shadow-xl">
                                    <img src="{{ asset('images/seragam/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent"></div>
                                    <div class="absolute bottom-0 inset-x-0 p-6 text-left">
                                        @if ($item->hari)
                                            <span class="px-3 py-1 bg-amber-500/20 text-amber-400 border border-amber-500/30 rounded-full text-xs font-semibold mb-2 inline-block">{{ $item->hari }}</span>
                                        @endif
                                        <h3 class="text-xl font-bold text-white mb-1">{{ $item->nama }}</h3>
                                        @if ($item->keterangan)
                                            <p class="text-slate-300 text-xs line-clamp-2">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination seragam-pagination"></div>
                </div>
            @else
                <p class="text-center text-slate-400">Belum ada data seragam.</p>
            @endif

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.seragamSlider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.seragam-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });
        });
    </script>

    <!-- 7. Quote Card Section (Paling Bawah) -->
    <div class="relative rounded-3xl p-8 md:p-12 bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 text-slate-950 shadow-2xl overflow-hidden text-center">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/20 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-black/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl mx-auto space-y-4">
            <div class="w-12 h-12 bg-slate-950/10 rounded-2xl flex items-center justify-center mx-auto text-slate-950 text-xl">
                <i class="fa-solid fa-quote-left"></i>
            </div>
            <p class="text-lg md:text-2xl font-black tracking-tight leading-snug">
                "{{ $quote->isi ?? 'Pendidikan bukan cuma tentang mengisi wadah yang kosong, tapi tentang menyalakan api semangat belajar tanpa batas.' }}"
            </p>
            <div class="pt-2">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-900/80">— {{ $quote->tokoh ?? 'Ki Hajar Dewantara' }}</span>
            </div>
        </div>
    </div>

        <!-- Section Statistik Sekolah -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 text-center shadow-lg hover:-translate-y-1 transition-transform duration-300">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-amber-400/10 flex items-center justify-center text-amber-400 text-xl">
                <i class="fa-solid fa-user-graduate"></i>
            </div>
            <h3 class="text-2xl md:text-3xl font-black text-white">{{ $setting->jumlah_siswa ?? 0 }}+</h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mt-1">Siswa</p>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 text-center shadow-lg hover:-translate-y-1 transition-transform duration-300">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-amber-400/10 flex items-center justify-center text-amber-400 text-xl">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <h3 class="text-2xl md:text-3xl font-black text-white">{{ $setting->jumlah_guru ?? 0 }}+</h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mt-1">Guru & Staf</p>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 text-center shadow-lg hover:-translate-y-1 transition-transform duration-300">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-amber-400/10 flex items-center justify-center text-amber-400 text-xl">
                <i class="fa-solid fa-people-group"></i>
            </div>
            <h3 class="text-2xl md:text-3xl font-black text-white">{{ $setting->jumlah_alumni ?? 0 }}+</h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mt-1">Alumni</p>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 text-center shadow-lg hover:-translate-y-1 transition-transform duration-300">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-amber-400/10 flex items-center justify-center text-amber-400 text-xl">
                <i class="fa-solid fa-trophy"></i>
            </div>
            <h3 class="text-2xl md:text-3xl font-black text-white">{{ $setting->jumlah_prestasi ?? 0 }}+</h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mt-1">Prestasi</p>
        </div>
    </div>

</div>
@endsection