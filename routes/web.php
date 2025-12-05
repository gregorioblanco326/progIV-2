<?php

use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::get('reports/exportar', [ReporteController::class, 'exportarFallos']);

Route::resource('reports', ReporteController::class)->names([
    'index' => 'reports.listar',
    'store' => 'reports.crear',
    'show' => 'reports.ver',
    'update' => 'reports.actualizar',
    'destroy' => 'reports.eliminar',
]);
