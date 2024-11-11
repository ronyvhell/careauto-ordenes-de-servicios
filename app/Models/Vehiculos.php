<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'marca',
        'modelo', // Asegúrate de que este campo esté aquí
        'color',
        'placa',
        'tipo_vehiculo',
        'numero_chasis',
        'numero_motor',
        'año', // Asegúrate de que este campo esté aquí
    ];
}
