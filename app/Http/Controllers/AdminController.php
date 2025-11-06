<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('user', 'productos')->latest()->get();
        return view('admin.pedidos', compact('pedidos'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:preparacion,en camino,entregado',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $request->estado;
        $pedido->save();

        return back()->with('success', 'Estado del pedido actualizado');
    }
}
