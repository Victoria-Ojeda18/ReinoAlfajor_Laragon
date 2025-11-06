@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold text-center text-amber-900 mb-4">Carrito de Compras</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(count($carrito) > 0)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @php $total = 0; @endphp
                        @foreach($carrito as $item)
                            @php $total += $item->producto->precio * $item->cantidad; @endphp
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $item->producto->imagen }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $item->producto->nombre }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${{ $item->producto->precio }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('carrito.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="w-16 text-center border-gray-300 rounded-md">
                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Actualizar</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${{ $item->producto->precio * $item->cantidad }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('carrito.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4 bg-gray-100 flex justify-end items-center">
                    <span class="text-lg font-medium text-gray-900">Total: ${{ $total }}</span>
                </div>
            </div>

            <div class="text-center mt-8">
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-block bg-amber-900 text-white px-8 py-3 rounded-lg hover:bg-amber-800 transition text-lg font-semibold">
                        Finalizar Compra
                    </button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-700">Tu carrito está vacío.</p>
        @endif
    </div>
</section>
@endsection
