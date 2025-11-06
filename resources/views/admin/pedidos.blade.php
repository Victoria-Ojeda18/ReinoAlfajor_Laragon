@extends('layouts.app')

@section('title', 'Admin - Pedidos')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold text-center text-amber-900 mb-4">Administración de Pedidos</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Productos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pago</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach($pedido->productos as $producto)
                                    {{ $producto->nombre }} (x{{ $producto->pivot->cantidad }})<br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ $pedido->productos->sum(function($producto) { return $producto->pivot->cantidad * $producto->pivot->precio; }) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pedido->pagado ? 'Pagado' : 'Pendiente' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($pedido->estado) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.pedidos.status', $pedido->id) }}" method="POST">
                                    @csrf
                                    <select name="estado" class="border-gray-300 rounded-md">
                                        <option value="preparacion" @if($pedido->estado == 'preparacion') selected @endif>En preparación</option>
                                        <option value="en camino" @if($pedido->estado == 'en camino') selected @endif>En camino</option>
                                        <option value="entregado" @if($pedido->estado == 'entregado') selected @endif>Entregado</option>
                                    </select>
                                    <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded-lg hover:bg-amber-800 transition">Actualizar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
