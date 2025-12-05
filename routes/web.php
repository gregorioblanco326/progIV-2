<?php

use App\Http\Controllers\OrdenController;
use Illuminate\Support\Facades\Route;

Route::resource('orders', OrdenController::class)->names([
    'index' => 'orders.listar',
    'store' => 'orders.crear',
    'show' => 'orders.ver',
    'update' => 'orders.actualizar',
    'destroy' => 'orders.eliminar',
]);
