<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

/**
 * Controlador para la gestión de pedidos desde el panel de administración.
 */
class AdminController extends Controller
{
    /**
     * Muestra la lista de todos los pedidos en el panel de administración.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pedidos = Pedido::with('user', 'productos')->latest()->get();

        return view('admin.pedidos', compact('pedidos'));
    }

    /**
     * Actualiza el estado de un pedido específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
