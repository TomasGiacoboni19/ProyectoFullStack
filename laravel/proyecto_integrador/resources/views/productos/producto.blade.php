@include('header')

<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">


<body>

<section id="producto-detalle">

    <h2 class="section-title">Detalles del Producto</h2>

    <div class="producto-detail">
        <h3>{{$producto->nombre_producto}}</h3>
        <p><strong>Precio: {{$producto->precio_producto}}</strong></p>
        <p><strong>Stock: {{$producto->stock_producto}}</strong> </p>
        <form action="/carrito/agregar" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 300px;">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">
            <label for="cantidad" >Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="{{ $producto->stock_producto }}" required>
            <button type="submit">Agregar al carrito </button>
        </form>
    </div>
    <a href="/productos/{{$producto->id_producto}}/editar" style="color: black">Editar el producto</a>

</section>
@include('footer')

</body>

