<?php

use App\Http\Controllers\OrdenController;
use Illuminate\Support\Facades\Route;

Route::resource('orders', OrdenController::class)->names([
    'index' => 'orders.listar',
    'create' => 'orders.formularioCrear',
    'store' => 'orders.crear',
    'show' => 'orders.ver',
    'edit' => 'orders.formularioEditar',
    'update' => 'orders.actualizar',
    'destroy' => 'orders.eliminar',
]);
