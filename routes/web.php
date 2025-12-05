<?php

use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;

Route::resource('profiles', PerfilController::class)->names([
    'index' => 'profiles.listar',
    'store' => 'profiles.crear',
    'show' => 'profiles.ver',
    'update' => 'profiles.actualizar',
    'destroy' => 'profiles.eliminar',
]);
