@extends('layouts.app')

@section('titulo', 'Registrar Mascota')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
            <div class="card-body p-5">
                <h1 class="text-dark fw-bold mb-4">🐾 Registrar Nueva Mascota</h1>
                
                @if ($errors->any())
                    <div class="alert alert-danger">Revise los campos marcados en rojo.</div>
                @endif

                <form action="{{ route('mascotas.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Nombre de la Mascota *</label>
                                <input type="text" name="nombre_mascota" value="{{ old('nombre_mascota') }}" 
                                       class="form-control @error('nombre_mascota') is-invalid @enderror" placeholder="Ej. Max" required>
                                @error('nombre_mascota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Tipo de Animal *</label>
                                <select name="tipo_animal" id="tipo_animal" class="form-select @error('tipo_animal') is-invalid @enderror" onchange="toggleOtro()" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Perro" {{ old('tipo_animal') == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ old('tipo_animal') == 'Gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="Pájaro" {{ old('tipo_animal') == 'Pájaro' ? 'selected' : '' }}>Pájaro</option>
                                    <option value="Conejo" {{ old('tipo_animal') == 'Conejo' ? 'selected' : '' }}>Conejo</option>
                                    <option value="Otro" {{ old('tipo_animal') == 'Otro' ? 'selected' : '' }}>Otro...</option>
                                </select>
                            </div>

                            <div class="mb-3 d-none" id="input_otro">
                                <label class="form-label text-dark fw-bold">Especifique el animal *</label>
                                <input type="text" name="otro_tipo" id="otro_tipo" class="form-control" placeholder="¿Qué animal es?">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Dueño de la Mascota *</label>
                                <input type="text" name="nombre_propietario" value="{{ old('nombre_propietario') }}" 
                                       class="form-control @error('nombre_propietario') is-invalid @enderror" placeholder="Nombre completo" required>
                                @error('nombre_propietario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Teléfono de Contacto *</label>
                                <input type="text" name="telefono" value="{{ old('telefono') }}" 
                                       class="form-control @error('telefono') is-invalid @enderror" placeholder="Ej. 0987654321" required>
                                @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Fecha de Salida *</label>
                                {{-- Aquí forzamos la fecha actual de Ecuador --}}
                                <input type="date" name="fecha_salida" 
                                       value="{{ old('fecha_salida', \Carbon\Carbon::now('America/Guayaquil')->format('Y-m-d')) }}" 
                                       class="form-control @error('fecha_salida') is-invalid @enderror" required>
                                @error('fecha_salida') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-dark fw-bold">Estado Inicial *</label>
                                <select name="estado" class="form-select" required>
                                    <option value="hospedado" selected>Hospedado</option>
                                    <option value="recogido">Recogido</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Instrucciones Especiales (Alimentación, medicinas...)</label>
                        <textarea name="instrucciones_especiales" class="form-control" rows="3" placeholder="Opcional">{{ old('instrucciones_especiales') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('mascotas.index') }}" class="btn btn-light px-4 fw-bold">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold shadow">Guardar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleOtro() {
        const select = document.getElementById('tipo_animal');
        const inputDiv = document.getElementById('input_otro');
        const inputManual = document.getElementById('otro_tipo');

        if (select.value === 'Otro') {
            inputDiv.classList.remove('d-none');
            inputManual.setAttribute('required', 'required');
            inputManual.name = "tipo_animal";
            select.name = "tipo_animal_old";
        } else {
            inputDiv.classList.add('d-none');
            inputManual.removeAttribute('required');
            inputManual.name = "otro_tipo";
            select.name = "tipo_animal";
        }
    }
</script>
@endsection