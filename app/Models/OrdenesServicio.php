<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrdenesServicio extends Model
{
    protected $table = 'ordenes_servicios';

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Tecnicos::class, 'tecnico_id');
    }

    public function datosTaller(): BelongsTo
    {
        return $this->belongsTo(DatosTaller::class, 'datos_taller_id');
    }

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Productos::class, 'ordenes_servicio_producto', 'orden_servicio_id', 'producto_id');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicios::class, 'ordenes_servicio_servicio', 'orden_servicio_id', 'servicio_id');
    }
}
