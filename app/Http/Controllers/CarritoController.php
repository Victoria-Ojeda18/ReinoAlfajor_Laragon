<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
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

    }

            public function index()
    {
        $carrito = Carrito::where('user_id', Auth::id())->with('producto')->get();
        return view('carrito', compact('carrito'));
    }

    public function remove($id)
    {
        Carrito::destroy($id);
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

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
