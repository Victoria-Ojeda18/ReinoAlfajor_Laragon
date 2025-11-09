<?php

namespace App\Http\Controllers;

use App\Models\Producto;

/**
 * Controlador para gestionar el catálogo de productos.
 */
class CatalogoController extends Controller
{
    /**
     * Muestra la página del catálogo con todos los productos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productos = Producto::all();

        return view('catalogo', compact('productos'));
    }
}
