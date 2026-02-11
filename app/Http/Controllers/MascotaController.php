<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::getMascotas();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:100',
            'tipo_animal' => 'required|string|max:50',
            'nombre_propietario' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'fecha_salida' => 'required|date|after_or_equal:today',
            'estado' => 'required|in:hospedado,recogido',
            'instrucciones_especiales' => 'nullable|string',
        ]);

        Mascota::createMascota($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada exitosamente.');
    }

    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:100',
            'tipo_animal' => 'required|string|max:50',
            'nombre_propietario' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'fecha_salida' => 'nullable|date',
            'instrucciones_especiales' => 'nullable|string',
            'estado' => 'required|in:hospedado,recogido',
        ]);

        $mascota->updateMascota($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada exitosamente.');
    }

    public function destroy(Mascota $mascota)
    {
        Mascota::deleteMascota($mascota);
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada exitosamente.');
    }

    public function recogida(Mascota $mascota)
    {
        Mascota::updateMascotaRecogida($mascota);
        return redirect()->route('mascotas.index')->with('success', 'Mascota marcada como recogida.');
    }

    public function hospedado(Mascota $mascota)
    {
        Mascota::updateMascotaHospedado($mascota);
        return redirect()->route('mascotas.index')->with('success', 'Mascota marcada como hospedada.');
    }
}