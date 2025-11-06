@extends('layouts.app')

@section('title', 'Mis Pedidos - Reino Alfajor')

@section('content')
<section class="py-16 bg-amber-50">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-6 text-center">
            Hola, {{ Auth::user()->name }} 🍪
        </h1>

        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-8">
                <p class="bg-green-100 text-green-800 px-4 py-3 rounded-lg text-center">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        <!-- Lista de pedidos -->
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-amber-900 mb-6 text-center">Mis pedidos</h2>
            
            @forelse($pedidos as $pedido)
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-amber-900">Pedido #{{ $pedido->id }}</h3>
                            <p class="text-gray-600">{{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-amber-900">Total: ${{ $pedido->productos->sum(function($producto) { return $producto->pivot->cantidad * $producto->pivot->precio; }) }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-amber-900 mb-2">Productos:</h4>
                        <ul class="list-disc list-inside">
                            @foreach($pedido->productos as $producto)
                                <li>{{ $producto->nombre }} (x{{ $producto->pivot->cantidad }})</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <span class="font-semibold text-amber-900">Estado del pago:</span>
                            @if($pedido->pagado)
                                <span class="text-green-600">Pagado</span>
                            @else
                                <span class="text-red-600">Pendiente</span>
                            @endif
                        </div>
                        <div>
                            <span class="font-semibold text-amber-900">Estado del pedido:</span>
                            <span class="text-blue-600">{{ ucfirst($pedido->estado) }}</span>
                        </div>
                    </div>

                    @if(!$pedido->pagado)
                        <div class="text-right mt-4">
                            <form action="{{ route('pedidos.pagar', $pedido->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-400 transition">Pagar</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <div class="bg-white p-8 rounded-xl shadow-sm text-center">
                    <p class="text-gray-600 text-lg">No tienes pedidos aún.</p>
                </div>
            @endforelse
        </div>

        <!-- Botón de cerrar sesión -->
        <div class="max-w-xs mx-auto mt-12">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-gray-200 text-amber-900 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</section>
@endsection