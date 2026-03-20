<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/q/{slug}', [LeadController::class, 'handleScan']);
Route::get('/contacto', [LeadController::class, 'showForm'])->name('lead.form');
Route::middleware('throttle:3,1')->post('/enviar-inquiry', [LeadController::class, 'store'])->name('leads.store');
// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/qrs', [QrCodeController::class, 'index'])->name('qrs.index');
    Route::post('/admin/qrs', [QrCodeController::class, 'store'])->name('qrs.store');
    Route::delete('/admin/qrs/{qr}', [QrCodeController::class, 'destroy'])->name('qrs.destroy');
});


//require __DIR__.'/auth.php';
