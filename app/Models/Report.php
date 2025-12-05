<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_falla',
        'descripcion_falla',
        'equipo_afectado',
        'prioridad',
        'estado',
        'fecha_reporte',
    ];
}
