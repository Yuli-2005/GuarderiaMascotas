@extends('layouts.app')

@section('titulo', 'Mascotas Hospedadas')

@section('contenido')
<style>
    
    .pet-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #333;
    }

    .pet-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .header-section {
        color: white;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    
    .btn-text {
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
    }
</style>

<div class="container py-4">
    <div class="header-section d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="display-4 fw-bold">Mascotas</h1>
            <p class="lead">Listado de huéspedes actuales</p>
        </div>
        <a href="{{ route('mascotas.create') }}" class="btn btn-primary btn-lg shadow-sm">
             Nuevo Registro
        </a>
    </div>

   
    <div class="row g-4">
        @foreach ($mascotas as $mascota)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card pet-card h-100 shadow-sm">
                    <div class="card-body p-4 d-flex flex-column">
                        {{-- Badge de Estado --}}
                        <span class="badge status-badge {{ $mascota->estado == 'hospedado' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($mascota->estado) }}
                        </span>

                        <h3 class="card-title fw-bold text-primary mb-3">
                            {{ $mascota->nombre_mascota }}
                        </h3>
                        
                        <div class="mb-2">
                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Propietario</small>
                            <span class="text-dark">{{ $mascota->nombre_propietario }}</span>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Tipo</small>
                                <span>{{ $mascota->tipo_animal }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Salida</small>
                                <span>{{ \Carbon\Carbon::parse($mascota->fecha_salida)->format('d/m/Y') }}</span>
                            </div>
                        </div>

                        <hr class="mt-auto">

                        {{-- Botones con Texto --}}
                        <div class="d-grid gap-2">
                            <div class="btn-group w-100 shadow-sm">
                                <a href="{{ route('mascotas.show', $mascota) }}" class="btn btn-outline-primary btn-text">
                                    Ver
                                </a>
                                <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-outline-warning btn-text">
                                    Editar
                                </a>
                            </div>
                            
                            @if ($mascota->estado == 'hospedado')
                                <form action="{{ route('mascotas.recogida', $mascota) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-text" onclick="return confirm('¿Marcar como recogida?')">
                                        Entregar Mascota
                                    </button>
                                </form>
                                
                                <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-text" onclick="return confirm('¿Eliminar definitivamente?')">
                                        Eliminar Registro
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('mascotas.hospedado', $mascota) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-text text-white" onclick="return confirm('¿Marcar como hospedado?')">
                                        Re-Hospedar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
