<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controlador para gestionar el formulario de contacto.
 */
class ContactoController extends Controller
{
    /**
     * Muestra el formulario de contacto.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contacto');
    }

    /**
     * Procesa el envío del formulario de contacto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
            'mensaje' => 'required|string',
        ]);

        // Aquí puedes enviar un correo, guardar en base de datos, etc.
        // Por ahora, solo redirigimos con mensaje de éxito
        return back()->with('success', '¡Gracias por tu mensaje! Nos pondremos en contacto pronto.');
    }
}
