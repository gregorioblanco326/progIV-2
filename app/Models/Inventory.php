<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_articulo',
        'codigo_sku',
        'cantidad_stock',
        'precio_costo',
        'ubicacion',
        'fecha_vencimiento',
        'ultima_entrada',
        'proveedor_id',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date',
        'ultima_entrada' => 'datetime',
    ];
}
