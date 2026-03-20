@extends('layouts.app')

@section('title', 'Promo data collected - Bilans ERP')

@section('content')

    {{-- Stats --}}
    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
            <span class="text-3xl font-black text-blue-600 block">{{ $totalLeads }}</span>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Leads</span>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
            <span class="text-3xl font-black text-green-500 block">{{ $todayLeads }}</span>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Hoy</span>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
            <span class="text-3xl font-black text-purple-500 block">{{ $thisMonthLeads }}</span>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Este Mes</span>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50">
            <h2 class="text-2xl font-black text-slate-800 tracking-tighter">Potenciales Clientes</h2>
            <p class="text-slate-400 text-xs font-medium">Solicitudes recibidas del formulario promocional</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="text-[10px] font-black text-slate-300 uppercase tracking-widest border-b border-gray-50">
                    <th class="px-6 py-4">Contacto</th>
                    <th class="px-6 py-4">Empresa</th>
                    <th class="px-6 py-4">Teléfono</th>
                    <th class="px-6 py-4">Interés</th>
                    <th class="px-6 py-4">Tamaño</th>
                    <th class="px-6 py-4">Fuente</th>
                    <th class="px-6 py-4">Mensaje</th>
                    <th class="px-6 py-4">Fecha</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                @forelse($leads as $lead)
                    <tr class="hover:bg-slate-50/50 transition group">
                        <td class="px-6 py-5">
                            <span class="block font-bold text-slate-700 text-sm">{{ $lead->full_name }}</span>
                            <a href="mailto:{{ $lead->email }}"
                               class="text-xs text-blue-400 hover:underline font-mono">{{ $lead->email }}</a>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-sm text-slate-600">{{ $lead->company_name ?? '—' }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]/', '', $lead->phone) }}&text=Hola%20{{ urlencode($lead->full_name) }},%20le%20contactamos%20de%20Bilans%20ERP."
                               target="_blank"
                               class="inline-flex items-center gap-1.5 text-xs text-green-600 font-bold hover:underline">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                {{ $lead->phone }}
                            </a>
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-blue-500 text-[9px] font-bold rounded uppercase">
                                {{ $lead->interest->name ?? '—' }}
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-xs text-slate-500">{{ $lead->businessSize->name ?? '—' }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-500 text-[9px] font-bold rounded uppercase">
                                {{ $lead->source->name ?? '—' }}
                            </span>
                        </td>
                        <td class="px-6 py-5 max-w-xs">
                            @if($lead->message)
                                <p class="text-xs text-slate-400 truncate" title="{{ $lead->message }}">
                                    {{ $lead->message }}
                                </p>
                            @else
                                <span class="text-slate-300 text-xs">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-xs text-slate-400 block">{{ $lead->created_at->format('d/m/Y') }}</span>
                            <span class="text-[10px] text-slate-300">{{ $lead->created_at->format('h:i A') }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-16 text-center text-slate-300 text-sm font-bold uppercase tracking-widest">
                            Sin leads aún
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($leads->hasPages())
            <div class="p-6 border-t border-gray-50">
                {{ $leads->links() }}
            </div>
        @endif
    </div>
@endsection
