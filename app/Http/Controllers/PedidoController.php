<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Mail\NuevoPedido;
use App\Mail\ConfirmacionPedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        $carrito = Carrito::where('user_id', Auth::id())->get();

        if($carrito->isEmpty()){
            return redirect()->route('catalogo')->with('error', 'Tu carrito está vacío');
        }

        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'tipo_alfajor' => 'Varios',
            'cantidad' => $carrito->sum('cantidad'),
            'status' => 'pendiente',
            'payment_method' => 'simulado',
        ]);

        foreach ($carrito as $item) {
            $pedido->productos()->attach($item->producto_id, [
                'cantidad' => $item->cantidad,
                'precio' => $item->producto->precio
            ]);
        }

        Carrito::where('user_id', Auth::id())->delete();

        Mail::to('victoriaojeda@epet12smandes.edu.ar')->send(new NuevoPedido($pedido));
        Mail::to(Auth::user()->email)->send(new ConfirmacionPedido($pedido));

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado con éxito!');
    }

    public function pagar($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->pagado = true;
        $pedido->save();

        return redirect()->route('pedidos')->with('success', 'Pedido pagado con éxito');
    }
}
