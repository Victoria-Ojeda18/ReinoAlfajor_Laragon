<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class CatalogoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('catalogo', compact('productos'));
    }
}