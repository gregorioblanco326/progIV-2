<?php

Route::apiResource('tasks', TareaController::class)->names([
    'index' => 'tasks.listar',
    'store' => 'tasks.crear',
    'show' => 'tasks.ver',
    'update' => 'tasks.actualizar',
    'destroy' => 'tasks.eliminar',
]);
