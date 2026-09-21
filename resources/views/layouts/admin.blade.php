<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Web Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-slate-100 min-h-screen flex">


            <!-- SIDEBAR INDEPENDENT SCROLL -->
<aside class="w-64 bg-[#0B132B] text-slate-300 h-screen sticky top-0 overflow-y-auto p-4 flex flex-col justify-between shrink-0">
    <div>
        <!-- Logo & Header Admin Panel -->
        <div class="flex items-center gap-3 px-3 py-4 mb-4 border-b border-slate-800">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-white leading-tight">Admin Panel</h2>
                <p class="text-xs text-slate-400">Web Profil Sekolah</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-6">
            
            <!-- Dashboard Menu -->
            <div>
                <a href="{{ url('/admin/dashboard') }}" 
                   class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/dashboard') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- GROUP: PENGATURAN -->
        <div>
            <p class="px-3.5 text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Pengaturan</p>
            <div class="space-y-1">
                <a href="{{ route('admin.settings.index') }}" 
                    class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.settings.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21v-7m0-4V3m8 18v-9m0-4V3m8 18v-5m0-4V3M1 14h6M9 8h6M17 16h6" />
                    </svg>
                    <span>Profil Sekolah</span>
                </a>
                <a href="{{ route('admin.struktur-organisasi.index') }}" 
                    class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.struktur-organisasi.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4" />
                    </svg>
                    <span>Organisasi Sekolah</span>
                </a>
            </div>
        </div>

            <!-- GROUP: DATA AKADEMIK -->
            <div>
                <p class="px-3.5 text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Data Akademik</p>
                <div class="space-y-1">
                    <!-- Data Guru -->
                    <a href="{{ url('/admin/teachers') }}" 
                       class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/teachers*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Data Guru</span>
                    </a>

                    <!-- Data Jurusan -->
                    <a href="{{ url('/admin/jurusans') }}" 
                       class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/jurusans*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Data Jurusan</span>
                    </a>

                    <!-- Ekstrakurikuler -->
                    <a href="{{ url('/admin/ekstrakurikuler') }}" 
                       class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/ekstrakurikuler*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Ekstrakurikuler</span>
                    </a>

                                        <!-- Prestasi -->
                    <a href="{{ url('/admin/prestasi') }}" 
                       class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/prestasi*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h2m2 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                        <span>Prestasi</span>
                    </a>
                </div>
            </div>

           <!-- GROUP: KONTEN WEB -->
<div>
    <p class="px-3.5 text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Konten Web</p>
    <div class="space-y-1">

        <a href="{{ route('admin.artikel.index') }}" 
            class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/artikel*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span>Berita / Artikel</span>
        </a>

        <a href="{{ route('admin.pengumuman.index') }}" 
            class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/pengumuman*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
                <span>Pengumuman</span>
        </a>

        <a href="{{ route('admin.agenda.index') }}" 
            class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->is('admin/agenda*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
                <span>Agenda</span>
        </a>

        <!-- Galeri Foto -->
        <a href="{{ route('admin.galleries.index') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.galleries.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Galeri Foto</span>
        </a>

        <!-- Fasilitas -->
<a href="{{ route('admin.fasilitas.index') }}" 
   class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.fasilitas.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2M5 21H3m16 0h-5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 6v-3a1 1 0 011-1h0a1 1 0 011 1v3" />
    </svg>
    <span>Fasilitas</span>
</a>

<!-- Seragam Sekolah -->
<a href="{{ route('admin.seragam.index') }}" 
   class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.seragam.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5l3-3h10l3 3M4 5v14a2 2 0 002 2h12a2 2 0 002-2V5M4 5h16M9 9v6m6-6v6" />
    </svg>
    <span>Seragam Sekolah</span>
</a>

<!-- Quote -->
<a href="{{ route('admin.quote.edit') }}" 
   class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.quote.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
    </svg>
    <span>Quote Beranda</span>
</a>

        <!-- Pesan Masuk -->
        <a href="{{ route('admin.kontak.index') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all duration-200 hover:bg-[#1C2541] hover:text-white {{ request()->routeIs('admin.kontak.*') ? 'bg-[#1C2541] text-white font-semibold' : 'text-slate-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span>Pesan Masuk</span>
        </a>

    </div>
</div>

        </nav>
    </div>
    <!-- Footer Sidebar: Kembali ke Beranda -->
    <div class="pt-4 border-t border-slate-800">
        <a href="{{ url('/') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium text-slate-400 hover:bg-[#1C2541] hover:text-white transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Kembali ke Beranda</span>
        </a>
    </div>
</aside>

        <div class="flex min-h-screen bg-slate-100">
    <!-- Main Content Area -->
            <main class="flex-1 p-6 overflow-y-auto">
             @yield('content')
            </main>
    </div>

</body>
</html>