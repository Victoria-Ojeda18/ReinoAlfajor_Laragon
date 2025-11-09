<?php

namespace App.Http.Controllers;

/**
 * Controlador para gestionar la página de inicio.
 */
class HomeController extends Controller
{
    /**
     * Muestra la página de inicio de la aplicación.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('inicio');
    }
}
