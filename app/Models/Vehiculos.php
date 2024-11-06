<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'marca',
        'version',
        'color',
        'placa',
        'tipo_vehiculo',
        'numero_chasis',
        'numero_motor',
    ];
}
