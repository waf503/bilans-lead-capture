<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bilans ERP - Registro')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://erpbilans.com/wp-content/uploads/2025/01/Icon180.png" sizes="32x32">
    <link rel="apple-touch-icon" href="https://erpbilans.com/wp-content/uploads/2025/01/Icon180.png">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4 md:p-8 lg:p-12 font-sans">

<div class="w-full md:w-[90%] lg:w-[85%] lg:max-w-5xl bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-gray-100 transition-all duration-500">

    <div class="bg-slate-900 p-10 md:p-16 text-center relative overflow-hidden">
        <img src="{{ asset('images/logo.png') }}" alt="Bilans Logo" class="h-12 md:h-20 mx-auto mb-6 relative z-10 transition-transform hover:scale-105">

        <div class="relative z-10">
            <h1 class="text-xl md:text-3xl font-black text-white tracking-[0.4em] uppercase">
                BILANS <span class="text-blue-400">ERP</span>
            </h1>
            <p class="text-slate-500 text-[9px] md:text-[12px] mt-3 font-bold uppercase tracking-[0.3em]">
                Intelligent Business Control
            </p>
        </div>

        <div class="absolute top-0 right-0 w-48 h-48 bg-blue-500/10 rounded-full -mr-20 -mt-20 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-slate-500/10 rounded-full -ml-10 -mb-10 blur-xl"></div>
    </div>

    <main class="relative">
        <div class="max-w-3xl mx-auto px-6 md:px-10 pt-8">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-5 rounded-2xl flex items-center shadow-sm">
                    <svg class="w-6 h-6 text-green-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-800 text-sm font-bold uppercase tracking-wide">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-5 rounded-2xl shadow-sm">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-red-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-red-800 text-xs font-black uppercase tracking-widest">Error de Información</p>
                    </div>
                    <ul class="list-disc list-inside text-xs text-red-600 font-medium space-y-1 ml-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="transition-opacity duration-300">
            @yield('content')
        </div>
    </main>

    <div class="bg-slate-50 p-8 text-center border-t border-gray-100">
        <div class="flex flex-col md:flex-row justify-center items-center gap-2 md:gap-4">
            <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest">Bilans Cloud Marketing</span>
            <span class="hidden md:inline text-slate-300">|</span>
            <span class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">© {{ date('Y') }} All Rights Reserved</span>
        </div>
    </div>
</div>

</body>
</html>
