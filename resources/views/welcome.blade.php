@extends('layouts.guest')

@section('title', 'Solicitud de Información - Bilans ERP')

@section('content')
    <div class="max-w-2xl mx-auto px-6 md:px-10 py-12 text-center">

        {{-- Headline --}}
        <h2 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight leading-tight">
            Transforma la gestión de tu empresa
        </h2>
        <p class="text-slate-400 text-sm md:text-base mt-4 leading-relaxed">
            Bilans ERP es la solución inteligente para controlar tus operaciones, finanzas y equipos desde un solo lugar.
        </p>

        {{-- Features --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-10 text-left">
            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                <div class="text-2xl mb-2">📊</div>
                <h3 class="text-xs font-black text-slate-700 uppercase tracking-widest mb-1">Control Total</h3>
                <p class="text-xs text-slate-400 leading-relaxed">Monitorea tus operaciones en tiempo real desde cualquier dispositivo.</p>
            </div>
            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                <div class="text-2xl mb-2">⚡</div>
                <h3 class="text-xs font-black text-slate-700 uppercase tracking-widest mb-1">Alta Eficiencia</h3>
                <p class="text-xs text-slate-400 leading-relaxed">Automatiza procesos repetitivos y enfoca tu equipo en lo que importa.</p>
            </div>
            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                <div class="text-2xl mb-2">🔒</div>
                <h3 class="text-xs font-black text-slate-700 uppercase tracking-widest mb-1">100% Seguro</h3>
                <p class="text-xs text-slate-400 leading-relaxed">Tu información protegida con los más altos estándares de seguridad.</p>
            </div>
        </div>

        {{-- Divider --}}
        <div class="flex items-center my-10">
            <div class="flex-1 border-t border-slate-100"></div>
            <span class="px-4 text-[10px] text-slate-300 font-bold uppercase tracking-widest">¿Listo para comenzar?</span>
            <div class="flex-1 border-t border-slate-100"></div>
        </div>

        {{-- WhatsApp CTA --}}
        <a href="https://api.whatsapp.com/send?phone=50377445560&text=%C2%A1Hola!%20Me%20gustar%C3%ADa%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios%20del%20ERP%20BILANS.%20%F0%9F%93%9D%20Origen%3A%20Home%20Bilans%20Contactos"
           target="_blank"
           class="inline-flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-4 rounded-xl shadow-lg transition-all active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Hablar con un Asesor
        </a>

        <p class="text-[10px] text-slate-300 mt-4 uppercase tracking-widest">
            Respuesta inmediata · Sin compromisos
        </p>

    </div>
@endsection
