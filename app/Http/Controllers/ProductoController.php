<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listar()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|unique:products|max:50',
            'precio' => 'required|numeric|min:0',
            'cantidad_stock' => 'required|integer|min:0',
            'disponible' => 'boolean',
            'detalles' => 'nullable|string',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }


    public function ver(Product $product)
    {
        return response()->json($product);
    }

    public function actualizar(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'codigo' => 'string|max:50|unique:products,codigo,' . $product->id,
            'precio' => 'numeric|min:0',
            'cantidad_stock' => 'integer|min:0',
            'disponible' => 'boolean',
            'detalles' => 'nullable|string',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function eliminar(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
