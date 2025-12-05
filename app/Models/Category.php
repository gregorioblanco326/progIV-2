<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen_url',
        'orden',
        'esta_publicada',
    ];
}
