@extends('layouts.guest')

@section('title', 'Bilans Admin - Login')

@section('content')
    <div class="max-w-md mx-auto px-6 md:px-10 py-8">

        <div class="text-center mb-8">
            <p class="text-slate-400 text-sm font-medium uppercase tracking-widest">Panel de Control</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Correo Electrónico</label>
                <input type="email" name="email" required autofocus
                       value="{{ old('email') }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                @error('email')
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
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
@endsection
