<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilans Admin - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4">

<div class="max-w-md w-full bg-white rounded-2xl shadow-2xl p-8">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-black text-blue-600 tracking-tighter">BILANS <span class="text-slate-800">ERP</span></h1>
        <p class="text-slate-400 text-sm mt-2 font-medium uppercase tracking-widest">Panel de Control</p>
    </div>

    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Correo Electrónico</label>
            <input type="email" name="email" required autofocus
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Contraseña</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
        </div>

        <button type="submit"
                class="w-full bg-slate-900 hover:bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg transition-all active:scale-95">
            Iniciar Sesión
        </button>
    </form>
</div>

</body>
</html>
