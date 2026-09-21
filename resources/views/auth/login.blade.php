<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Profil Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-slate-800 rounded-3xl p-8 shadow-2xl border border-slate-700">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-amber-400 text-slate-900 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-lg">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-wide">Login Admin</h2>
            <p class="text-xs text-slate-400 mt-1">Masuk untuk mengelola data sekolah</p>
        </div>

        @if($errors->any())
            <div class="mb-4 bg-red-500/10 border border-red-500/50 text-red-400 text-xs p-3 rounded-xl text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-2">Email Admin</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@gmail.com"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 transition">
                </div>
            </div>

            <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-slate-900 text-sm font-bold py-3 rounded-xl transition shadow-lg flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-amber-400 transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>