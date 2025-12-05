<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function listar()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'in:pendiente,en_progreso,completada',
            'fecha_limite' => 'nullable|date',
            'usuario_asignado_id' => 'nullable|integer|exists:users,id',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function ver(Task $task)
    {
        return response()->json($task);
    }

    public function actualizar(Request $request, Task $task)
    {
        $request->validate([
            'titulo' => 'string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'in:pendiente,en_progreso,completada',
            'fecha_limite' => 'nullable|date',
            'usuario_asignado_id' => 'nullable|integer|exists:users,id',
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    public function eliminar(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
