    <!-- Vista para la página de la fábrica.
    Muestra información sobre el proceso artesanal de elaboración de los alfajores
    y los valores de la empresa. -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Fábricas de Alfajores</h2>
    <p>Conoce las fábricas artesanales que proveen nuestros deliciosos alfajores mensuales.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200?text=Alfajores+La+Dulce" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Alfajores La Dulce</h5>
                    <p class="card-text">Fábrica en Córdoba, Argentina. 20 años de tradición.</p>
                </div>
            </div>
        </div>

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold text-center text-amber-900 mb-8">Nuestra Fábrica</h1>
        <p class="text-xl text-center text-gray-700 mb-16 max-w-3xl mx-auto">
            Conocé el proceso artesanal detrás de cada alfajor. Desde la selección de ingredientes hasta el empaque final, cada paso es realizado con amor y dedicación.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            @foreach($proceso as $index => $paso)
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-start">
                    <div class="bg-amber-900 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold mr-4 flex-shrink-0">
                        {{ $index + 1 }}
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-amber-900 mb-3">{{ $paso['titulo'] }}</h3>
                        <p class="text-gray-700">{{ $paso['descripcion'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-amber-900 text-white rounded-lg p-12">
            <h2 class="text-3xl font-bold text-center mb-8">Nuestros Valores</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-3">Tradición</h3>
                    <p class="text-amber-100">Recetas transmitidas de generación en generación</p>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-3">Innovación</h3>
                    <p class="text-amber-100">Nuevos sabores sin perder la esencia</p>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-3">Pasión</h3>
                    <p class="text-amber-100">Amor por lo que hacemos en cada detalle</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@endsection