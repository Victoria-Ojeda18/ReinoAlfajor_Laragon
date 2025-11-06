<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tu Pedido - Reino Alfajor</title>
</head>
<body style="font-family: Arial, sans-serif; background: #fff8e1; padding: 20px;">
    <h2>¡Hola, {{ $pedido->user->name }}! 🍪</h2>
    <p>Gracias por tu pedido en <strong>Reino Alfajor</strong>.</p>
    <p>Estamos preparando tu pedido:</p>
    <h2>Detalles de tu Pedido:</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
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
    <p><strong>Estado del Pedido:</strong> {{ $pedido->status }}</p>
    <p><strong>Método de Pago:</strong> {{ $pedido->payment_method }}</p>
    <p>¡Lo recibirás muy pronto! 🎁</p>
    <p>— El equipo de Reino Alfajor</p>
</body>
</html>