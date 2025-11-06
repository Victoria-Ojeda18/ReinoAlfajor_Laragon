<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo Pedido</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>¡Nuevo pedido recibido! 🍪</h2>
    <p><strong>Usuario:</strong> {{ $pedido->user->name }} ({{ $pedido->user->email }})</p>
    <h2>Detalles del Pedido:</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>${{ $producto->pivot->precio }}</td>
                    <td>${{ $producto->pivot->cantidad * $producto->pivot->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total:</strong> ${{ $pedido->productos->sum(function($producto) { return $producto->pivot->cantidad * $producto->pivot->precio; }) }}</p>
    <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Estado del Pedido:</strong> {{ $pedido->status }}</p>
    <p><strong>Método de Pago:</strong> {{ $pedido->payment_method }}</p>
</body>
</html>