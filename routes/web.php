<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/', function () {
    return redirect()->route('mascotas.index');
});

Route::resource('mascotas', MascotaController::class);
Route::post('mascotas/{mascota}/recogida', [MascotaController::class, 'recogida'])->name('mascotas.recogida');
Route::post('mascotas/{mascota}/hospedado', [MascotaController::class, 'hospedado'])->name('mascotas.hospedado');
