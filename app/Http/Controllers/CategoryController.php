<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listar()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:categories|max:255',
            'slug' => 'required|string|unique:categories|max:255',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|url|max:255',
            'orden' => 'integer|min:0',
            'esta_publicada' => 'boolean',
            'categoria_padre_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function ver(Category $category)
    {
        return response()->json($category);
    }

    public function actualizar(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:categories,nombre,' . $category->id,
            'slug' => 'string|max:255|unique:categories,slug,' . $category->id,
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|url|max:255',
            'orden' => 'integer|min:0',
            'esta_publicada' => 'boolean',
            'categoria_padre_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

    public function eliminar(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
