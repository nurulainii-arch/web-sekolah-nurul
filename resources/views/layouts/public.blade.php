<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK NEGERI 1 CIJATI')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
</head>
<body class="bg-slate-100 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- NAVBAR UTAMA -->
    <header class="bg-[#0b132b] text-white shadow-lg sticky top-0 z-50 border-b-2 border-amber-400" x-data="{ openGuru: false }">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="text-amber-400 text-2xl"><i class="fa-solid fa-school"></i></div>
                <h1 class="font-extrabold text-xl tracking-wider uppercase text-white">{{ $setting->school_name ?? 'SMK NEGERI 1 CIJATI' }}</h1>
            </a>
            
           <nav class="hidden md:flex items-center gap-1 text-sm font-semibold flex-nowrap">
    <!-- 1. Beranda -->
    <a href="{{ route('home') }}" 
       class="px-2.5 py-2 rounded-lg transition whitespace-nowrap {{ request()->routeIs('home') ? 'bg-amber-400 text-slate-950 font-bold' : 'text-slate-300 hover:text-amber-400' }}">
        <i class="fa-solid fa-house text-xs"></i> Beranda
    </a>

    <!-- 2. Profil Sekolah (Dropdown) -->
    <div class="relative group">
        <button class="flex items-center gap-1.5 px-2.5 py-2 text-sm font-bold rounded-xl hover:bg-slate-800 transition duration-200 whitespace-nowrap {{ request()->routeIs('profil.*') ? 'text-amber-400' : 'text-slate-300 hover:text-amber-400' }}">
            <i class="fa-solid fa-building-columns text-amber-400"></i>
            <span>Profil Sekolah</span>
            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
        </button>

        <div class="absolute left-0 top-full pt-2 w-56 hidden group-hover:block z-50 transition-all duration-200">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-2 shadow-2xl">
                <a href="{{ route('profil.sejarah') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-scroll text-amber-400 w-4"></i>
                    <span>Sejarah Singkat</span>
                </a>
                <a href="{{ route('profil.galeri') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-images text-amber-400 w-4"></i>
                    <span>Galeri Sekolah</span>
                </a>
                <a href="{{ route('profil.akreditasi') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-award text-amber-400 w-4"></i>
                    <span>Akreditasi Sekolah</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Guru (Dropdown) -->
    <div class="relative group">
        <button class="flex items-center gap-1.5 px-2.5 py-2 text-sm font-bold text-white rounded-xl hover:bg-slate-800 transition duration-200 whitespace-nowrap">
            <i class="fa-solid fa-user-tie text-amber-400"></i>
            <span>Guru</span>
            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
        </button>

        <div class="absolute right-0 top-full pt-2 w-56 hidden group-hover:block z-50 transition-all duration-200">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-2 shadow-2xl">
                <a href="/guru/pplg" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-laptop-code text-amber-400 w-4"></i>
                    <span>Guru Kejuruan PPLG</span>
                </a>
                <a href="/guru/bdp" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-store text-amber-400 w-4"></i>
                    <span>Guru Kejuruan BDP</span>
                </a>
                <a href="/guru/aphp" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-wheat-awn text-amber-400 w-4"></i>
                    <span>Guru Kejuruan APHP</span>
                </a>
                <a href="/guru/tkr" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-wrench text-amber-400 w-4"></i>
                    <span>Guru Kejuruan TKR</span>
                </a>

                <div class="my-1 border-t border-slate-800"></div>

                <a href="/guru/mapel" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-book-open text-amber-400 w-4"></i>
                    <span>Guru Mapel</span>
                </a>
                <a href="/guru/tu" class="flex items-center gap-3 px-3 py-2.5 text-xs font-semibold text-slate-300 rounded-xl hover:bg-amber-400 hover:text-slate-950 transition">
                    <i class="fa-solid fa-clipboard-user text-amber-400 w-4"></i>
                    <span>Staf Tata Usaha</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 4. Ekstrakulikuler -->
    <a href="{{ route('ekskul') }}" 
       class="px-2.5 py-2 rounded-lg transition whitespace-nowrap {{ request()->routeIs('ekskul') ? 'bg-amber-400 text-slate-950 font-bold' : 'text-slate-300 hover:text-amber-400' }}">
        <i class="fa-solid fa-futbol mr-1"></i> Ekstrakulikuler
    </a>

    <!-- 5. Jurusan -->
    <a href="{{ route('jurusan') }}" 
       class="px-2.5 py-2 rounded-lg transition whitespace-nowrap {{ request()->routeIs('jurusan') ? 'bg-amber-400 text-slate-950 font-bold' : 'text-slate-300 hover:text-amber-400' }}">
        <i class="fa-solid fa-graduation-cap mr-1"></i> Jurusan
    </a>

    <!-- 6. Prestasi -->
    <a href="{{ route('prestasi') }}" 
       class="px-2.5 py-2 rounded-lg transition whitespace-nowrap {{ request()->routeIs('prestasi') ? 'bg-amber-400 text-slate-950 font-bold' : 'text-slate-300 hover:text-amber-400' }}">
        <i class="fa-solid fa-trophy mr-1"></i> Prestasi
    </a>
</nav>
        </div>
    </header>

    <!-- CONTENT HALAMAN -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <!-- Footer Utama -->
<footer class="bg-slate-900 border-t border-slate-800 text-slate-300 mt-20 pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Grid Konten Footer -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
            
            <!-- Kolom 1: Profil & Deskripsi Singkat -->
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-amber-400 flex items-center justify-center text-slate-950 font-black">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <span class="text-lg font-black text-white tracking-tight">SMKN 1 CIJATI</span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Sekolah Menengah Kejuruan unggulan yang berfokus pada pengembangan keahlian teknologi, industri, dan karakter siswa.
                </p>
                <!-- Media Sosial -->
                <div class="flex items-center gap-2 pt-2">
                    <a href="https://youtube.com" target="_blank" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 text-slate-300 flex items-center justify-center transition-all duration-300">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 text-slate-300 flex items-center justify-center transition-all duration-300">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="https://x.com" target="_blank" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 text-slate-300 flex items-center justify-center transition-all duration-300">
                        <i class="fa-brands fa-x-twitter text-sm"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 text-slate-300 flex items-center justify-center transition-all duration-300">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 3: Kontak Kami -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">
                    Kontak
                </h3>
                <ul class="space-y-3 text-xs">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-amber-400 w-4"></i>
                        <span>+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-amber-400 w-4"></i>
                        <span>info@smkn1cijati.sch.id</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-clock text-amber-400 w-4"></i>
                        <span>Senin - Jumat: 07.00 - 15.30</span>
                    </li>
                </ul>
            </div>

                        <!-- Kolom 4: Alamat Sekolah -->
            <div class="md:col-span-1">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">
                    Lokasi Kami
                </h3>

                @if(!empty($setting->maps_embed_url))
                    <div class="rounded-xl overflow-hidden border border-slate-800 shadow-lg mb-3">
                        <iframe
                            src="{{ $setting->maps_embed_url }}"
                            width="100%"
                            height="180"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endif

                <div class="flex items-start gap-3 text-xs leading-relaxed text-slate-400">
                    <i class="fa-solid fa-location-dot text-amber-400 w-4 mt-0.5"></i>
                    <span>{{ $setting->address ?? 'Alamat belum diisi' }}</span>
                </div>
            </div>

        </div>


    <footer class="bg-[#0b132b] text-slate-400 py-6 border-t border-slate-800 text-center text-sm">
        <p>&copy; {{ date('Y') }} {{ $setting->school_name ?? 'SMK NEGERI 1 CJATI' }}. All Rights Reserved.</p>
    </footer>
</body>
</html>