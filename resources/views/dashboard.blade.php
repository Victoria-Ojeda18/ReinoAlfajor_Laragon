
    <!-- Vista para el panel de control del usuario.
    Muestra un mensaje de bienvenida y otra información relevante.
    Incluye el botón para cerrar sesión. -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>¡Hola, {{ Auth::user()->name }}! 🎉</h2>
    <p>Bienvenido a tu panel de miembro del Club del Alfajor.</p>
    <div class="alert alert-success">
        🍪 Próximo envío de alfajores: <strong>15 de Junio</strong>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Miembros Activos</h5>
                    <p>1.250 miembros recibiendo alfajores este mes.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Próximo Sabor</h5>
                    <p>Alfajor de Dulce de Leche</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('logout') }}" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="btn btn-outline-danger mt-3">
        Cerrar sesión
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection