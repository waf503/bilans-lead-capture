@extends('layouts.guest')

@section('title', 'Solicitud de Información - Bilans ERP')

@section('content')

    <form action="{{ route('leads.store') }}" method="POST" class="p-8 md:p-12 space-y-6">
        @csrf

        <input type="hidden" name="source_id" value="{{ $source_id ?? null }}">
        <input type="hidden" name="qr_code_id" value="{{ $qr_code_id ?? null }}">
        <div class="hidden" aria-hidden="true">
            <input type="text" name="my_digital_signature" tabindex="-1" autocomplete="off">
        </div>
        <div class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Nombre y Apellido</label>
                    <input type="text" name="full_name" required placeholder="Ej. Roberto Gómez"
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition shadow-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Nombre de Empresa</label>
                    <input type="text" name="company_name" placeholder="Opcional"
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Correo de Contacto</label>
                    <input type="email" name="email" required placeholder="tu@empresa.com"
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition shadow-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">WhatsApp / Cel</label>
                    <input type="tel" name="phone" required placeholder="7777-0000"
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition shadow-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 border-t border-slate-50 pt-4">
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Tamaño Empresa</label>
                    <select name="business_size_id" class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none appearance-none cursor-pointer">
                        @foreach($businessSizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Módulo de Interés</label>
                    <select name="interest_id" class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none appearance-none cursor-pointer">
                        @foreach($interests as $interest)
                            <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Consulta Adicional</label>
                <textarea name="message" rows="3" placeholder="¿En qué podemos ayudarte?"
                          class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none resize-none transition shadow-sm"></textarea>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 uppercase text-xs tracking-[0.2em]">
            Enviar
        </button>
    </form>
@endsection
