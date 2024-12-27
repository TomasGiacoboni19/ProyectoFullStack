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

    <title>Mis compras</title>
</head>
<body>
@include('header', ['carrito' => $carrito])
<section id="mis-compras">
    <h2 class="section-title">Mis Compras</h2>
    <div class="compras-list">
        <h3>Historial de Compras</h3>
        @if($pedidos->isEmpty())
            <p>No tienes compras registradas.</p>
        @else
            <ul>
                @foreach($pedidos as $pedido)
                    <li>
                        <strong>Fecha del pedido:</strong> {{ $pedido->fecha_pedido }}<br>
                        <strong>Carrito de compra:</strong> @if($pedido->carritoDisponible) ABIERTO @else CERRADO @endif <br>
                        <strong>Estado del pedido:</strong> @if(!$pedido->entregado) NO ENTREGADO @else ENTREAGO @endif <br>
                        <strong>Total:</strong> ${{ number_format($pedido->precio_total, 2) }}
                        <a href="/pedidos/{{$pedido->id_pedido}}"><p><strong style="color: #18181b"> Ver el pedido </strong></p></a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
<a href="{{ route('pedidos.exportar') }}" class="btn btn-success">Descargar en PDF</a>


@include('footer')
</body>
</html>
