@extends('layouts.app')

@section('title', 'Gestión de Campañas QR')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-black text-slate-800 mb-6 tracking-tight">Nuevo Punto</h2>
                <form action="{{ route('qrs.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Nombre Identificador</label>
                        <input type="text" name="internal_name" placeholder="Ej: Valla Santa Elena KM 10" required
                               class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 transition outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Fuente / Canal</label>
                        <select name="source_id" class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none text-sm appearance-none">
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl hover:bg-blue-600 shadow-xl shadow-slate-200 transition-all active:scale-95">
                        Activar Tracking QR
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex justify-between items-end">
                <div>
                    <h2 class="text-2xl font-black text-slate-800 tracking-tighter">Campañas Activas</h2>
                    <p class="text-slate-400 text-xs font-medium">Monitoreo de tráfico en tiempo real</p>
                </div>
                <div class="text-right">
                    <span class="text-3xl font-black text-blue-600 block">{{ $totalScans }}</span>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Escaneos Totales</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="text-[10px] font-black text-slate-300 uppercase tracking-widest border-b border-gray-50">
                        <th class="px-8 py-4">Campaña / Fuente</th>
                        <th class="px-8 py-4">URL de Rastreo</th>
                        <th class="px-8 py-4 text-center">Impactos</th>
                        <th class="px-8 py-4">QR Preview</th>
                        <th class="px-8 py-4 text-right">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                    @foreach($qrCodes as $qr)
                        <tr class="group hover:bg-slate-50/50 transition">
                            <td class="px-8 py-5">
                                <span class="block font-bold text-slate-700 text-sm">{{ $qr->internal_name }}</span>
                                <span class="inline-block mt-1 px-2 py-0.5 bg-blue-50 text-blue-500 text-[9px] font-bold rounded uppercase">{{ $qr->source->name }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <code class="text-xs text-blue-400 font-mono bg-blue-50/30 px-2 py-1 rounded">/q/{{ $qr->slug }}</code>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="font-black text-slate-800">{{ $qr->scan_count }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="bg-white p-1 rounded-lg border border-gray-100 shadow-sm w-fit">
                                    {!!
                                        QrCode::size(80)
                                            ->format('svg')
                                            ->errorCorrection('H') // Alta corrección para que el logo no afecte la lectura
                                            ->generate(url('/q/' . $qr->slug))
                                    !!}
                                </div>
                                <a href="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(500)->generate(url('/q/'.$qr->slug))) }}"
                                   download="qr-{{ $qr->slug }}.svg"
                                   class="text-[9px] text-blue-500 font-bold uppercase mt-1 block hover:underline">
                                    Descargar para Impresión
                                </a>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <form action="{{ route('qrs.destroy', $qr->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este tracking?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-slate-300 hover:text-red-500 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
