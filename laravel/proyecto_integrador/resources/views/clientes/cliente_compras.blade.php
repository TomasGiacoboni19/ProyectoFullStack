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
    <link rel="stylesheet" href="{{ asset('css/misPedidos.css')}}">
    <title>Mis compras</title>
</head>
<body>
@include('header', ['carrito' => $carrito])
<section id="mis-compras">
    <div class="compras-list">
        <h3>Historial de Compras</h3>
        <hr>
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
            <a href="{{ route('pedidos.exportar') }}">
                <div class="descargaPDF">
                    <button class="button" type="button">
                        <span class="button__text">PDF</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                      </button>
                </div>
            </a>
    </div>
</section>

@include('footer')
</body>
</html>
