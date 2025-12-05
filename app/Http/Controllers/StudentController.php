<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // READ: Obtener todos los registros
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    // CREATE: Guardar un nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:students,correo_electronico',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'estado_activo' => 'boolean',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    // READ: Obtener un registro específico
    public function show(Student $student)
    {
        return response()->json($student);
    }

    // UPDATE: Actualizar un registro existente
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'correo_electronico' => 'email|unique:students,correo_electronico,' . $student->id,
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string|max:255',
            'estado_activo' => 'boolean',
        ]);

        $student->update($request->all());
        return response()->json($student);
    }

    // DELETE: Eliminar un registro
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }
}
