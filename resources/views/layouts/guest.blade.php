<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bilans ERP - Registro')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4 font-sans">

<div class="max-w-xl w-full bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">

    <div class="bg-slate-900 p-10 text-center relative">
        <img src="{{ asset('images/logo.png') }}" alt="Bilans Logo" class="h-14 mx-auto mb-4 relative z-10">
        <div class="relative z-10">
            <h1 class="text-xl font-black text-white tracking-[0.3em] uppercase">BILANS <span class="text-blue-400">ERP</span></h1>
            <p class="text-slate-500 text-[10px] mt-2 font-bold uppercase tracking-[0.2em]">Intelligent Business Control</p>
        </div>
        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full -mr-16 -mt-16"></div>
    </div>

    <main>
        <div class="px-8 pt-4">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl flex items-center shadow-sm animate-pulse">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-green-800 text-xs font-bold uppercase tracking-wider">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl shadow-sm">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-red-800 text-[10px] font-black uppercase tracking-widest">Error de Validación</p>
                    </div>
                    <ul class="list-disc list-inside text-[10px] text-red-600 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @yield('content')
    </main>

    <div class="bg-gray-50 p-6 text-center border-t border-gray-50">
        <p class="text-[9px] text-gray-400 uppercase font-black tracking-widest">Powered by Bilans Cloud Marketing &copy; {{ date('Y') }}</p>
    </div>
</div>

</body>
</html>
