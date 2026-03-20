<?php

namespace App\Http\Controllers;

use App\Models\BusinessSize;
use App\Models\Interest;
use App\Models\Lead;
use App\Models\QrCode;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // This handles the "Scan" from the billboard
    public function handleScan($slug)
    {
        $qr = QrCode::where('slug', $slug)->first();

        if (!$qr) {
            // Fallback to general if slug is wrong
            return redirect()->route('lead.form');
        }

        // Increment analytics
        $qr->increment('scan_count');

        // Send them to the form with the IDs in the URL (Query Parameters)
        return redirect()->route('lead.form', [
            'source_id' => $qr->source_id,
            'qr_code_id' => $qr->id
        ]);
    }

    // This shows the actual Blade form
    public function showForm(Request $request)
    {
        $interests = Interest::all();
        $businessSizes = BusinessSize::all();

        return view('lead-form', [
            'interests' => $interests,
            'businessSizes' => $businessSizes,
            'source_id' => $request->query('source_id', 3), // Default to "Web" if empty
            'qr_code_id' => $request->query('qr_code_id')
        ]);
    }
    public function store(Request $request)
    {
        // 1. Validar los datos (Sanitize input)
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'company_name'     => 'nullable|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'required|string|max:20',
            'business_size_id' => 'required|exists:business_sizes,id',
            'interest_id'      => 'required|exists:interests,id',
            'message'          => 'nullable|string|max:1000',
            'qr_code_id'       => 'nullable|exists:qr_codes,id',
            'source_id'        => 'nullable|exists:sources,id',
        ]);
        if ($request->filled('my_digital_signature')) {
            return back()->with('error', 'Bot detected!');
        }

        // 2. Crear el Lead en la base de datos
        Lead::create($validated);

        // 3. Redirigir con un mensaje de éxito
        return back()->with('success', '¡Gracias! Tu solicitud ha sido enviada. Pronto te contactaremos.');
    }
}
