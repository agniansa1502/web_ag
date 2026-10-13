<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - MTs Al Muawanah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
        <!-- HEADER LOGIN -->
        <div class="bg-emerald-950 text-white p-8 text-center space-y-3 relative">
            <a href="{{ route('home') }}" class="absolute top-4 left-4 text-emerald-200 hover:text-white text-xs flex items-center gap-1">
                <i class="bi bi-arrow-left"></i> Beranda
            </a>
            <img src="{{ asset('asets/image/logo_alma.png') }}" alt="Logo" class="w-16 h-16 object-contain bg-white rounded-full p-2 mx-auto shadow-md">
            <div>
                <h1 class="text-xl font-bold tracking-wide">MTs Al Muawanah</h1>
                <p class="text-xs text-amber-400">Portal Login Administrator</p>
            </div>
        </div>

        <!-- FORM LOGIN -->
        <form action="{{ route('login.process') }}" method="POST" class="p-8 space-y-5">
            @csrf

            {{-- ALERT ERROR --}}
            @if(session('error'))
                <div class="bg-red-50 text-red-600 border border-red-200 text-xs p-3.5 rounded-xl flex items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill shrink-0"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="space-y-1.5">
                <label for="username" class="text-xs font-bold text-slate-700">Username / Email</label>
                <div class="relative">
                    <input type="text" name="username" id="username" required placeholder="Masukkan username"
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-emerald-800">
                    <i class="bi bi-person absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="password" class="text-xs font-bold text-slate-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-emerald-800">
                    <i class="bi bi-lock absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                </div>
            </div>

            <button type="submit" class="w-full bg-emerald-900 hover:bg-emerald-800 text-white font-bold py-3 rounded-xl text-xs shadow-md transition flex items-center justify-center gap-2">
                <i class="bi bi-box-arrow-in-right"></i> Masuk ke Dashboard
            </button>
        </form>

        <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 text-center text-[11px] text-slate-500">
            &copy; {{ date('Y') }} MTs Al Muawanah. Hak Cipta Dilindungi.
        </div>
    </div>

</body>
</html>
