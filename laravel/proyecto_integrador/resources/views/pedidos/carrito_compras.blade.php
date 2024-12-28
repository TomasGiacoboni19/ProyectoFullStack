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
    <link rel="stylesheet" href="{{ asset('css/carrito.css')}}">
    <title>Mi pedido</title>
</head>
<body>
@include('header', ['carrito' => $carrito])
<section id="carrito">
    <div class="carrito-list">
        <h2 class="section-title">
            @if($pedido->carritoDisponible)
                Carrito de Compras
            @elseif(!$pedido->entregado)
                Estado del Pedido: Sin Entregar
            @else
                Estado del Pedido: Entregado
            @endif
        </h2>
        <hr>

        <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</p>
        <p><strong>Total de productos:</strong> {{ $pedido->item->count() }}</p>
        <p><strong>Fecha del pedido: </strong> {{ $pedido->fecha_pedido }}</p>
        
        <h3>Productos en el Pedido</h3>
        <hr>
        @foreach($pedido->item as $unItem)
            <div class="producto-item">
                <img class="fotoProd" src="{{ asset('storage/' . $unItem->producto->foto_producto) }}" alt="Foto del producto">
                <span>Cantidad: {{ $unItem->cantidad }}</span>
                <span>Total: ${{ $unItem->total }}</span>

                <!-- Botón para eliminar productos solo si el carrito está disponible -->
                @if($pedido->carritoDisponible)
                    <form action="/pedidos/{{$pedido->id_pedido}}}/items/{{ $unItem->id_producto_x_pedido }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                @endif
            </div>
        @endforeach

        <div class="totalPedido">
            <div>Total:</div>
            <div> $ {{ $pedido->precio_total }} </div>
        </div>

        

        <!-- Acciones según el estado del pedido -->
        @if($pedido->carritoDisponible)
        <a href="/pagos/{{ $pedido->id_pedido }}/seleccionar">
        <div class="contenedor">
            <div class="left-side">
                <div class="carta">
                    <div class="card-line"></div>
                    <div class="botones"></div>
                </div>
                <div class="post">
                    <div class="post-line"></div>
                    <div class="screen">
                        <div class="dollar">$</div>
                    </div>
                    <div class="numbers"></div>
                    <div class="numbers-line2"></div>
                </div>
            </div>
            <div class="right-side">
                <div class="new">Proceder al pago</div>
                <svg viewBox="0 0 451.846 451.847" height="512" width="512" xmlns="http://www.w3.org/2000/svg" class="arrow">
                    <path fill="#cfcfcf" data-old_color="#000000" class="active-path" data-original="#000000" d="M345.441 248.292L151.154 442.573c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744L278.318 225.92 106.409 54.017c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.287 194.284c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373z"></path>
                </svg>
            </div>
        </div>
        </a>       
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
