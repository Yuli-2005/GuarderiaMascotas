@extends('layouts.app')

@section('titulo', 'Ver Mascota')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
      
        <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.95); border-radius: 20px;">
            <div class="card-body p-4 p-md-5">
                
            
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="fw-bold text-primary mb-0">{{ $mascota->nombre_mascota }}</h1>
                        <p class="text-muted mb-0">Expediente de huésped</p>
                    </div>
                    <span class="badge rounded-pill px-4 py-2 {{ $mascota->estado == 'hospedado' ? 'bg-success' : 'bg-secondary' }}" style="font-size: 0.9rem;">
                        {{ strtoupper($mascota->estado) }}
                    </span>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="text-muted text-uppercase fw-bold small d-block">Tipo de Animal</label>
                            <span class="fs-5 text-dark">{{ $mascota->tipo_animal }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-muted text-uppercase fw-bold small d-block">Propietario / Dueño</label>
                            <span class="fs-5 text-dark">{{ $mascota->nombre_propietario }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="text-muted text-uppercase fw-bold small d-block">Teléfono de Contacto</label>
                            <span class="fs-5 text-dark">{{ $mascota->telefono }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-muted text-uppercase fw-bold small d-block">Fecha de Salida Programada</label>
                            <span class="fs-5 text-dark">{{ \Carbon\Carbon::parse($mascota->fecha_salida)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted text-uppercase fw-bold small d-block mb-2">Instrucciones Especiales</label>
                    <div class="p-3 rounded-3 border bg-light text-dark" style="min-height: 80px; font-style: italic;">
                        {{ $mascota->instrucciones_especiales ?: 'No se registraron instrucciones especiales para esta mascota.' }}
                    </div>
                </div>

                {{-- Tiempos de registro --}}
                <div class="row mt-4 pt-3 border-top">
                    <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
                        <small class="text-muted">
                            <strong>Ingreso:</strong> {{ $mascota->created_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    <div class="col-sm-6 text-center text-sm-end">
                        <small class="text-muted">
                            <strong>Última actualización:</strong> {{ $mascota->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>

         
                <div class="mt-5 d-flex flex-wrap gap-2">
                    <a href="{{ route('mascotas.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm">
                         Volver al Listado
                    </a>
                    <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-warning px-4 fw-bold shadow-sm">
                        Modificar Datos
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
