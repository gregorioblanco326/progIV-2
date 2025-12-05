<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'monto_total',
        'estado',
        'metodo_pago',
        'notas_cliente',
        'direccion_envio',
    ];

    /**
     * Relación: Una Orden pertenece a un Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
