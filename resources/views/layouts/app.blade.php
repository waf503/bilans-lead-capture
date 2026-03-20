<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bilans Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<nav class="bg-slate-900 p-4 shadow-lg text-white flex justify-between items-center">
    <h1 class="font-black tracking-tighter text-xl underline decoration-blue-500">
        BILANS <span class="text-blue-400">ADMIN</span>
    </h1>

    <div class="flex items-center gap-4">
        <span class="text-xs text-slate-400">Hola, {{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-xs bg-slate-800 hover:bg-red-600 px-3 py-1 rounded transition">Salir</button>
        </form>
    </div>
</nav>

<main class="max-w-7xl mx-auto p-6">
    @yield('content')
</main>

<footer class="text-center py-10 text-gray-400 text-xs uppercase tracking-widest">
    &copy; {{ date('Y') }} Bilans ERP - Control de Campañas
</footer>

</body>
</html>
