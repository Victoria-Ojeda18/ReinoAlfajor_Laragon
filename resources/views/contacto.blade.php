<!-- 
    Vista para la página de contacto.
    Muestra información sobre la empresa, detalles de contacto
    y enlaces para que los usuarios inicien sesión, se registren o vean sus pedidos. -->

@extends('layouts.app')

@section('title', 'Contacto - Reino Alfajor')

@section('content')
<section class="py-16 bg-amber-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-amber-900 mb-6">¿Quiénes somos?</h1>
            
            <div class="bg-white p-8 rounded-xl shadow-md mb-8">
                <p class="text-gray-700 text-lg mb-6">
                    Somos <strong>Reino Alfajor</strong>, una pequeña fábrica artesanal con raíces en la tradición argentina. 
                    Desde nuestra cocina familiar, preparamos cada alfajor con ingredientes seleccionados y mucho amor.
                </p>
                
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-amber-900 mb-3">📧 Contacto</h3>
                    <p class="text-gray-800 text-xl">
                        <a href="mailto:victoriaojeda@epet12smandes.edu.ar" class="text-amber-900 hover:text-amber-800 font-semibold">
                            Mail de emplesa
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-amber-900 mb-4">¿Querés hacer un pedido?</h3>
                    <p class="text-gray-700 mb-6">
                        Ingresá a tu cuenta o registrate para acceder al formulario de pedidos.
                    </p>
                    @guest
                        <a href="{{ route('login') }}" class="inline-block bg-amber-900 text-white px-8 py-3 rounded-lg hover:bg-amber-800 transition font-semibold text-lg">
                            Iniciar Sesión / Registrarse
                        </a>
                    @else
                        <a href="{{ route('pedidos') }}" class="inline-block bg-amber-900 text-white px-8 py-3 rounded-lg hover:bg-amber-800 transition font-semibold text-lg">
                            Ir a Mis Pedidos
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
@endsection