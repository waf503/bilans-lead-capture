<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrCodes = QrCode::with('source')->latest()->get();
        $sources = Source::all();
        $totalScans = $qrCodes->sum('scan_count');

        // Generate QR codes
        $qrImages = $qrCodes->mapWithKeys(function ($qr) {

            $qrCode = \Endroid\QrCode\QrCode::create(config('app.url') . '/q/' . $qr->slug)
                ->setErrorCorrectionLevel(\Endroid\QrCode\ErrorCorrectionLevel::High)
                ->setSize(500)
                ->setMargin(15)
                ->setForegroundColor(new \Endroid\QrCode\Color\Color(30, 30, 30))
                ->setBackgroundColor(new \Endroid\QrCode\Color\Color(255, 255, 255));

            $result = (new \Endroid\QrCode\Writer\SvgWriter())->write($qrCode);

            return [
                $qr->id => [
                    'dataUri'   => $result->getDataUri(),
                    'svgString' => $result->getString(),
                ]
            ];
        });

        return view('admin.qrs.index', compact('qrCodes', 'sources', 'totalScans', 'qrImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'internal_name' => 'required|string|max:100',
            'source_id' => 'required|exists:sources,id',
        ]);

        QrCode::create([
            'internal_name' => $request->internal_name,
            'source_id' => $request->source_id,
            'slug' => Str::slug($request->internal_name) . '-' . Str::lower(Str::random(5)),
            'is_active' => true,
        ]);

        return back()->with('success', '¡Campaña creada!');
    }

    // Actualizar el nombre o estado
    public function update(Request $request, QrCode $qr)
    {
        $request->validate(['internal_name' => 'required|string|max:100']);
        $qr->update($request->only('internal_name'));

        return back()->with('success', '¡Campaña actualizada!');
    }

    // Eliminar el QR (Cuidado: esto borra el tracking)
    public function destroy(QrCode $qr)
    {
        $qr->delete();
        return back()->with('success', 'Campaña eliminada correctamente.');
    }
}
