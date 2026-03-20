@extends('layouts.guest')

@section('content')
    <form action="{{ route('leads.store') }}" method="POST" class="p-6 sm:p-10 md:p-14 space-y-6" x-data>
        @csrf

        <input type="hidden" name="source_id" value="{{ $source_id ?? null }}">
        <input type="hidden" name="qr_code_id" value="{{ $qr_code_id ?? null }}">
        <div class="hidden" aria-hidden="true">
            <input type="text" name="my_digital_signature" tabindex="-1" autocomplete="off">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">

            <div class="sm:col-span-2">
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Nombre y Apellido</label>
                <input type="text" name="full_name" required placeholder="Ej. Roberto Gómez"
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition-all">
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Empresa</label>
                <input type="text" name="company_name" placeholder="Tu Negocio"
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition-all">
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Teléfono / Cel</label>
                <input type="tel" name="phone" required placeholder="7777-0000"
                       inputmode="numeric"
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition-all">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Correo Electrónico</label>
                <input type="email" name="email" required placeholder="correo@empresa.com"
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition-all">
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Tamaño Empresa</label>
                <select name="business_size_id" class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer shadow-sm">
                    @foreach($businessSizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Módulo de Interés</label>
                <select name="interest_id" class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer shadow-sm">
                    @foreach($interests as $interest)
                        <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2 tracking-widest">Consulta Adicional</label>
                <textarea name="message" rows="4" placeholder="¿En qué podemos ayudarte?"
                          class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-500 resize-none shadow-sm transition-all"></textarea>
            </div>
        </div>

        <div class="flex justify-center pt-2">
            <button type="submit"
                    class="w-full sm:w-2/3 lg:w-1/2 bg-blue-600 hover:bg-blue-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-[0.97] uppercase text-xs tracking-[0.2em]">
                Enviar Solicitud
            </button>
        </div>
    </form>
@endsection
