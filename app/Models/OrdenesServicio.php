<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrdenesServicio extends Model
{
    protected $table = 'ordenes_servicios';

    protected $fillable = [
        'cliente_id',
        'vehiculo_id',
        'tecnico_id',
        'datos_taller_id',
        'tipo_servicio',
        'fecha_creacion',
        'kilometraje',
        'nivel_combustible',
        'fallas_reportadas',
        'servicio',
        'precio',
        'procedimientos_autorizados',
        'verificacion_fluidos',
        'autorizacion_prueba_ruta',
        'fallas_detectadas',
        'objetos_valor',
        'documentos_vehiculo',
        'foto_frente',
        'foto_atras',
        'foto_lateral_izquierdo',
        'foto_lateral_derecho',
        'orden_servicio',
        'orden_salida',
        'tipo_documento',
    ];

    protected $casts = [
        'procedimientos_autorizados' => 'array',
        'verificacion_fluidos' => 'array',
        'documentos_vehiculo' => 'array',
    ];

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

    public function documentos()
    {
        return $this->hasMany(DocumentosOrdenesServicio::class, 'orden_servicio_id');
    }

}
