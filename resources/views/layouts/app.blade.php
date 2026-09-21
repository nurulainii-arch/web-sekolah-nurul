<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Web Profil Sekolah' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans">

    <!-- Navbar Public -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="font-bold text-xl text-indigo-600">SMK Negeri</a>
            <nav class="space-x-4 text-sm font-medium flex items-center">
    <a href="/" class="hover:text-indigo-600">Beranda</a>

    <!-- Dropdown Profil Sekolah -->
    <div class="relative inline-block group">
        <button class="hover:text-indigo-600 font-medium flex items-center gap-1 focus:outline-none">
            Profil Sekolah
            <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div class="absolute left-0 top-full mt-1 w-48 bg-white border border-slate-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 z-50">
            <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-t-lg">
                Sejarah Singkat
            </a>
            <a href="{{ route('profil.galeri') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-b-lg">
                Galeri Sekolah
            </a>
        </div>
    </div>

    <a href="/guru" class="hover:text-indigo-600">Guru</a>
    <a href="{{ url('/jurusan') }}" class="text-slate-700 hover:text-indigo-600 font-medium">Jurusan</a>
    <a href="{{ url('/ekstrakurikuler') }}" class="text-slate-700 hover:text-indigo-600 font-medium">Ekskul</a>
    <a href="/prestasi" class="hover:text-indigo-600">Prestasi</a>
</nav>
        </div>
    </header>

    <!-- Isi Konten Halaman Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Public -->
    <footer class="bg-slate-900 text-slate-400 mt-12 py-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-white font-bold mb-2">Web Profil Sekolah</h3>
                <p class="text-sm text-slate-400">Mewujudkan generasi unggul, berkarakter, dan berprestasi.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-2">Link Cepat</h4>
                <div class="grid grid-cols-2 gap-2 text-sm text-slate-400">
                    <a href="/" class="hover:text-white">Beranda</a>
                    <a href="/guru" class="hover:text-white">Guru</a>
                    <a href="/jurusan" class="hover:text-white">Jurusan</a>
                    <a href="/ekstrakurikuler" class="hover:text-white">Ekskul</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>