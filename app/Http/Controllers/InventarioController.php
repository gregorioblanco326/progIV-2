<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function listar(Request $request)
    {
        $query = Inventory::query();

        if ($request->has('buscar') && $request->buscar != '') {
            $searchTerm = $request->buscar;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nombre_articulo', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('codigo_sku', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('ubicacion', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('vence_antes_de') && $request->vence_antes_de != '') {
            $query->whereDate('fecha_vencimiento', '<=', $request->vence_antes_de);
        }

        $inventories = $query->get();
        return response()->json($inventories);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre_articulo' => 'required|string|unique:inventories|max:255',
            'codigo_sku' => 'required|string|unique:inventories|max:50',
            'cantidad_stock' => 'required|integer|min:0',
            'precio_costo' => 'required|numeric|min:0',
            'ubicacion' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'ultima_entrada' => 'required|date',
            'proveedor_id' => 'nullable|integer',
        ]);

        $inventory = Inventory::create($request->all());
        return response()->json($inventory, 201);
    }

    public function ver(Inventory $inventory)
    {
        return response()->json($inventory);
    }

    public function actualizar(Request $request, Inventory $inventory)
    {
        $request->validate([
            'nombre_articulo' => 'string|max:255|unique:inventories,nombre_articulo,' . $inventory->id,
            'codigo_sku' => 'string|max:50|unique:inventories,codigo_sku,' . $inventory->id,
            'cantidad_stock' => 'integer|min:0',
            'precio_costo' => 'numeric|min:0',
            'ubicacion' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'ultima_entrada' => 'date',
            'proveedor_id' => 'nullable|integer',
        ]);

        $inventory->update($request->all());
        return response()->json($inventory);
    }

    public function eliminar(Inventory $inventory)
    {
        $inventory->delete();
        return response()->json(null, 204);
    }
}
