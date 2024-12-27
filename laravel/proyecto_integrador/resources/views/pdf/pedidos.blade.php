<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedidos PDF</title>
</head>
<body>

<h1>Listado de Pedidos de {{$pedidos[0]->cliente->nombre}}</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id_pedido }}</td>
            <td>{{ $pedido->fecha_pedido }}</td>
            <td>{{ $pedido->precio_total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
