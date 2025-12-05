<?php

use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;

Route::resource('profiles', PerfilController::class)->names([
    'index' => 'profiles.listar',
    'create' => 'profiles.formularioCrear',
    'store' => 'profiles.crear',
    'show' => 'profiles.ver',
    'edit' => 'profiles.formularioEditar',
    'update' => 'profiles.actualizar',
    'destroy' => 'profiles.eliminar',
]);
