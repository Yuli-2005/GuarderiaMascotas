<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'nombre_mascota',
        'tipo_animal',
        'nombre_propietario', 
        'telefono',
        'fecha_salida',
        'instrucciones_especiales',
        'estado'
    ];

    static public function getMascotas()
    {
        return self::all();
    }

    static public function createMascota(array $data)
    {
        return self::create($data);
    }

    public function updateMascota(array $data)
    {
        return $this->update($data);
    }

    static public function updateMascotaRecogida(Mascota $mascota)
    {
        $mascota->estado = 'recogido';
        $mascota->save();
    }

    static public function updateMascotaHospedado(Mascota $mascota)
    {
        $mascota->estado = 'hospedado';
        $mascota->save();
    }

    static public function deleteMascota(Mascota $mascota)
    {
        $mascota->delete();
    }
}