<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function listar()
    {
        $orders = Order::with('usuario')->get();
        return response()->json($orders);
    }


    public function crear(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'monto_total' => 'required|numeric|min:0.01',
            'estado' => 'in:pendiente,procesando,enviado,completado,cancelado',
            'metodo_pago' => 'nullable|string|max:100',
            'direccion_envio' => 'required|string|max:255',
        ]);

        $order = Order::create($request->all());
        return response()->json($order->load('usuario'), 201);
    }

    public function actualizar(Request $request, Order $order)
    {
        $request->validate([
            'monto_total' => 'numeric|min:0.01',
            'estado' => 'in:pendiente,procesando,enviado,completado,cancelado',
            'metodo_pago' => 'nullable|string|max:100',
            'direccion_envio' => 'string|max:255',
        ]);

        $order->update($request->except('user_id'));
        return response()->json($order->load('usuario'));
    }

    public function eliminar(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
