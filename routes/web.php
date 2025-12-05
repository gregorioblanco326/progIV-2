<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::prefix('gestion')->group(function () {
    // CRUD Completo
    Route::get('productos', [ProductoController::class, 'listar']);
    Route::post('productos', [ProductoController::class, 'crear']);
    Route::get('productos/{product}', [ProductoController::class, 'ver']);
    Route::put('productos/{product}', [ProductoController::class, 'actualizar']);
    Route::delete('productos/{product}', [ProductoController::class, 'eliminar']);
});
