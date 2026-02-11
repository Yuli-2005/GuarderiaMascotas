@extends('layouts.app')

@section('titulo', 'Editar Mascota')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-10">
        {{-- Tarjeta con diseño profesional --}}
        <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
            <div class="card-body p-5">
                <h1 class="text-dark fw-bold mb-4">Editar Datos de {{ $mascota->nombre_mascota }}</h1>
                
                @if ($errors->any())
                    <div class="alert alert-danger">Revise los campos marcados en rojo.</div>
                @endif

                <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Nombre de la Mascota *</label>
                                <input type="text" name="nombre_mascota" value="{{ old('nombre_mascota', $mascota->nombre_mascota) }}" 
                                       class="form-control @error('nombre_mascota') is-invalid @enderror" 
                                       onkeypress="soloLetras(event)" required>
                                @error('nombre_mascota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Tipo de Animal *</label>
                                <select name="tipo_animal" id="tipo_animal" class="form-select @error('tipo_animal') is-invalid @enderror" onchange="toggleOtro()" required>
                                    @php 
                                        $opciones = ['Perro', 'Gato', 'Pájaro', 'Conejo'];
                                        $esOtro = !in_array($mascota->tipo_animal, $opciones);
                                    @endphp
                                    <option value="Perro" {{ $mascota->tipo_animal == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ $mascota->tipo_animal == 'Gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="Pájaro" {{ $mascota->tipo_animal == 'Pájaro' ? 'selected' : '' }}>Pájaro</option>
                                    <option value="Conejo" {{ $mascota->tipo_animal == 'Conejo' ? 'selected' : '' }}>Conejo</option>
                                    <option value="Otro" {{ $esOtro ? 'selected' : '' }}>Otro...</option>
                                </select>
                            </div>

                            {{-- Campo dinámico para "Otro" --}}
                            <div class="mb-3 {{ $esOtro ? '' : 'd-none' }}" id="input_otro">
                                <label class="form-label text-dark fw-bold">Especifique el animal *</label>
                                <input type="text" name="{{ $esOtro ? 'tipo_animal' : 'otro_tipo' }}" id="otro_tipo" 
                                       value="{{ $esOtro ? $mascota->tipo_animal : '' }}" 
                                       class="form-control" placeholder="¿Qué animal es?">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Dueño de la Mascota *</label>
                                <input type="text" name="nombre_propietario" value="{{ old('nombre_propietario', $mascota->nombre_propietario) }}" 
                                       class="form-control @error('nombre_propietario') is-invalid @enderror" 
                                       onkeypress="soloLetras(event)" required>
                                @error('nombre_propietario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Teléfono *</label>
                                <input type="text" name="telefono" value="{{ old('telefono', $mascota->telefono) }}" 
                                       class="form-control @error('telefono') is-invalid @enderror" 
                                       onkeypress="soloNumeros(event)" required>
                                @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Fecha de Salida *</label>
                                <input type="date" name="fecha_salida" value="{{ old('fecha_salida', $mascota->fecha_salida) }}" 
                                       class="form-control @error('fecha_salida') is-invalid @enderror" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Estado *</label>
                                <select name="estado" class="form-select" required>
                                    <option value="hospedado" {{ $mascota->estado == 'hospedado' ? 'selected' : '' }}>Hospedado</option>
                                    <option value="recogido" {{ $mascota->estado == 'recogido' ? 'selected' : '' }}>Recogido</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Instrucciones Especiales</label>
                        <textarea name="instrucciones_especiales" class="form-control" rows="3" 
                                  onkeypress="soloLetrasNumerosEspacios(event)">{{ old('instrucciones_especiales', $mascota->instrucciones_especiales) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('mascotas.index') }}" class="btn btn-light px-4 fw-bold">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold shadow">Actualizar Datos</button>
                    </div>
                </form>
            </div>