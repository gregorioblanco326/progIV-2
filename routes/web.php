<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, 'listar']);
Route::post('/categories', [CategoryController::class, 'crear']);
Route::get('/categories/{category}', [CategoryController::class, 'ver']);
Route::put('/categories/{category}', [CategoryController::class, 'actualizar']);
Route::delete('/categories/{category}', [CategoryController::class, 'eliminar']);
