<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->school_name ?? 'SMK NEGERI 1 CIJATI' }} - Beranda</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
</head>
<body class="bg-slate-100 text-slate-800 antialiased">

    <!-- NAVBAR UTAMA -->
    <header class="bg-[#0b132b] text-white shadow-lg sticky top-0 z-50 border-b-2 border-amber-400">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <!-- Logo & Nama Sekolah -->
            <div class="flex items-center gap-3">
                <div class="text-amber-400 text-2xl">
                    <i class="fa-solid fa-school"></i>
                </div>
                <h1 class="font-extrabold text-xl tracking-wider uppercase text-white">
                    {{ $setting->school_name ?? 'SMK NEGERI 1 CIJATI' }}
                </h1>
            </div>
            
            <!-- Menu Navigasi -->
            <nav class="hidden md:flex items-center gap-3 text-sm font-semibold">
                <a href="#hero" class="bg-amber-400 text-slate-900 px-4 py-2 rounded-lg flex items-center gap-2 font-bold shadow-md">
                    <i class="fa-solid fa-house text-xs"></i> Beranda
                </a>
                <a href="#guru" class="text-slate-200 hover:text-amber-400 px-3 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fa-solid fa-user-tie text-xs"></i> Guru <i class="fa-solid fa-chevron-down text-[10px]"></i>
                </a>
                <a href="#ekskul" class="text-slate-200 hover:text-amber-400 px-3 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fa-solid fa-futbol text-xs"></i> Ekstrakulikuler
                </a>
                <a href="#jurusan" class="text-slate-200 hover:text-amber-400 px-3 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-xs"></i> Jurusan
                </a>
                <a href="#prestasi" class="text-slate-200 hover:text-amber-400 px-3 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fa-solid fa-trophy text-xs"></i> Prestasi
                </a>
            </nav>
        </div>
    </header>

    <!-- HERO BANNER SECTION -->
    <section id="hero" class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 pb-10">
        <div class="relative w-full h-[380px] md:h-[450px] rounded-3xl overflow-hidden shadow-2xl border-4 border-amber-400/80 bg-slate-800">
            <!-- Image Background -->
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1600&q=80" 
                 alt="Gedung/Kelas Sekolah" 
                 class="w-full h-full object-cover object-center filter brightness-50">
            
            <!-- Dark Overlay Filter -->
            <div class="absolute inset-0 bg-blue-950/60 backdrop-blur-[1px]"></div>

            <!-- Content Inside Banner -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 text-white">
                <h2 class="text-3xl md:text-5xl font-black tracking-wider uppercase text-amber-400 drop-shadow-md mb-2">
                    {{ $setting->school_name ?? 'SMK NEGERI 1 CIJATI' }}
                </h2>
                <p class="text-lg md:text-2xl font-medium text-slate-100 tracking-wide drop-shadow">
                    Selamat Datang
                </p>
            </div>
        </div>
    </section>

    <!-- VISI & MISI SECTION CARD -->
    <section id="profil" class="max-w-7xl mx-auto px-4 sm:px-6 pb-16">
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-200">
            <div class="flex items-center gap-3 text-amber-500 font-bold text-2xl mb-4">
                <i class="fa-solid fa-compass"></i>
                <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight uppercase">Visi & Misi {{ $setting->school_name ?? 'SMKN 1 CIJATI' }}</h3>
            </div>
            <p class="text-slate-600 leading-relaxed text-base">
                {{ $setting->welcome_text ?? 'Mewujudkan lulusan yang berkarakter, berkompeten, dan siap bersaing di dunia kerja maupun perguruan tinggi.' }}
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#0b132b] text-slate-400 py-6 border-t border-slate-800 text-center text-sm">
        <p>&copy; {{ date('Y') }} {{ $setting->school_name ?? 'SMK Negeri 1 Cijati' }}. All Rights Reserved.</p>
    </footer>

</body>
</html>