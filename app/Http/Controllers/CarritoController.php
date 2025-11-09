<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para gestionar el carrito de compras.
 */
class CarritoController extends Controller
{
    /**
     * Agrega un producto al carrito o actualiza la cantidad si ya existe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito = Carrito::where('user_id', Auth::id())
            ->where('producto_id', $request->producto_id)
            ->first();

        if ($carrito) {
            $carrito->cantidad += $request->cantidad;
            $carrito->save();
        } else {
            Carrito::create([
                'user_id' => Auth::id(),
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
            ]);
        }

        return redirect()->route('catalogo')->with('success', 'Producto agregado al carrito');
    }

    /**
     * Muestra el contenido del carrito de compras.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $carrito = Carrito::where('user_id', Auth::id())->with('producto')->get();

        return view('carrito', compact('carrito'));
    }

    /**
     * Elimina un producto del carrito.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        Carrito::destroy($id);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito = Carrito::find($id);
        $carrito->cantidad = $request->cantidad;
        $carrito->save();

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada');
    }
}
