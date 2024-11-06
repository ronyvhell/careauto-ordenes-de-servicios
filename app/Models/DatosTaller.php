<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosTaller extends Model
{
    protected $table = 'datos_tallers';

    protected $fillable = [
        'nombre_taller',
        'direccion',
        'telefono',
        'email',
        'iva',
        'comision',
    ];
}
