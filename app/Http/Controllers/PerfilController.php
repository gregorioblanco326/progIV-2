<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function listar()
    {
        $profiles = Profile::with('user')->get();
        return response()->json($profiles);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:profiles,user_id',
            'nombre_completo' => 'nullable|string|max:255',
            'direccion_linea1' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'url_web' => 'nullable|url|max:255',
        ]);

        $profile = Profile::create($request->all());
        return response()->json($profile->load('user'), 201);
    }

    // Mapea a show (GET /profiles/{id}) - Ver
    public function ver(Profile $profile)
    {
        return response()->json($profile->load('user'));
    }

    public function actualizar(Request $request, Profile $profile)
    {
        $request->validate([
            'nombre_completo' => 'nullable|string|max:255',
            'direccion_linea1' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'url_web' => 'nullable|url|max:255',
        ]);

        $profile->update($request->except('user_id'));
        return response()->json($profile->load('user'));
    }
    public function eliminar(Profile $profile)
    {
        $profile->delete();
        return response()->json(null, 204);
    }
}
