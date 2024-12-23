<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">

    <title>Mi pedido</title>
</head>
<body>
@include('header')
<section id="carrito">
    <h2 class="section-title">
        @if($pedido->carritoDisponible)
            Carrito de Compras
        @elseif(!$pedido->entregado)
            Estado del Pedido: Sin Entregar
        @else
            Estado del Pedido: Entregado
        @endif
    </h2>

    <div class="carrito-list">
        <p>Cliente: {{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</p>
        <p>Total de productos: {{ $pedido->item->count() }}</p>
        <p>Fecha del pedido: {{ $pedido->fecha_pedido }}</p>

        <h3>Productos en el Pedido</h3>
        @foreach($pedido->item as $unItem)
            <div class="producto-item">
                    <span>Nombre:
                        <a href="/productos/{{ $unItem->producto->id_producto }}" style="color: black;">
                            {{ $unItem->producto->nombre_producto }}
                        </a>
                    </span>
                <span>Cantidad: {{ $unItem->cantidad }}</span>
                <span>Total: {{ $unItem->total }}</span>

                <!-- Botón para eliminar productos solo si el carrito está disponible -->
                @if($pedido->carritoDisponible)
                    <form action="/pedidos/{{$pedido->id_pedido}}}/items/{{ $unItem->id_producto_x_pedido }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                @endif
            </div>
        @endforeach

        <div>
            <strong>Total: {{ $pedido->precio_total }}</strong>
        </div>

        <!-- Acciones según el estado del pedido -->
        @if($pedido->carritoDisponible)
            <a href="/pagos/{{ $pedido->id_pedido }}/seleccionar" class="btn btn-primary">Proceder al Pago</a>
        @elseif(!$pedido->entregado)
            <p class="section-title">Estado Actual</p>
            <p>Sin entregar</p>
            <form action="/pedidos/{{$pedido->id_pedido}}/entregado" method="POST">
                @csrf
                @method("PUT")
                <button type="submit" class="btn btn-primary">Pedido entregado</button>
            </form>
        @else
            <p class="section-title">Estado Actual</p>
            <p>Entregado</p>
        @endif
    </div>
</section>
@include('footer')
</body>
</html>
