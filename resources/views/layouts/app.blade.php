<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bilans Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://erpbilans.com/wp-content/uploads/2025/01/Icon180.png" sizes="32x32">
    <link rel="apple-touch-icon" href="https://erpbilans.com/wp-content/uploads/2025/01/Icon180.png">
</head>
<body class="bg-gray-100 font-sans min-h-screen">

{{-- Top navbar --}}
<nav class="bg-slate-900 px-6 py-4 shadow-lg text-white flex justify-between items-center">
    <h1 class="font-black tracking-tighter text-xl underline decoration-blue-500">
        BILANS <span class="text-blue-400">ADMIN</span>
    </h1>
    <div class="flex items-center gap-4">
        <span class="text-xs text-slate-400">Hola, {{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-xs bg-slate-800 hover:bg-red-600 px-3 py-1.5 rounded-lg transition">Salir</button>
        </form>
    </div>
</nav>

<div class="flex min-h-[calc(100vh-64px)]">

    {{-- Sidebar --}}
    <aside class="w-56 bg-white border-r border-gray-100 shadow-sm flex-shrink-0">
        <div class="p-4 pt-6 space-y-1">

            <p class="text-[9px] font-black text-slate-300 uppercase tracking-widest px-3 mb-3">Marketing</p>

            <a href="{{ route('qrs.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all
                      {{ request()->routeIs('qrs.index') ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                QR Maintenance
            </a>

            <a href="{{ route('leads.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all
                      {{ request()->routeIs('leads.index') ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                Data tracking
            </a>

        </div>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 p-6 overflow-auto">
        @yield('content')
    </main>

</div>

<footer class="text-center py-6 text-gray-400 text-xs uppercase tracking-widest border-t border-gray-100 bg-white">
    &copy; {{ date('Y') }} Bilans ERP - Control de Campañas
</footer>

</body>
</html>
