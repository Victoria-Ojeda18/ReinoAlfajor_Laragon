<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Muestra la página de inicio del Club del Alfajor.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('inicio');
    }
}
