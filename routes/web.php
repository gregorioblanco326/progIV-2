<?php

use App\Http\Controllers\InventarioController;
use Illuminate\Support\Facades\Route;

Route::resource('inventories', InventarioController::class)->names([
    'index' => 'inventories.listar',
    'store' => 'inventories.crear',
    'show' => 'inventories.ver',
    'update' => 'inventories.actualizar',
    'destroy' => 'inventories.eliminar',
]);
