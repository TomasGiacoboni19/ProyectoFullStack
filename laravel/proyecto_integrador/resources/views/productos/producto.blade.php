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

    <title>Producto</title>
</head>
<body>
@include('header')

    <section id="producto-detalle">

        <h2 class="section-title">Detalles del Producto</h2>

        <div class="producto-detail">
            <h3>{{$producto->nombre_producto}}</h3>
            <p><strong>Precio: {{$producto->precio_producto}}</strong></p>
            <p><strong>Stock: {{$producto->stock_producto}}</strong> </p>
            <form action="/pedidos/{{$pedido->id_pedido}}/productos" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 300px;">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">
                <label for="cantidad" >Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="{{ $producto->stock_producto }}" required>
                <button type="submit">Agregar al carrito </button>
            </form>
        </div>

    </section>
    @include('footer')
</body>
</html>
