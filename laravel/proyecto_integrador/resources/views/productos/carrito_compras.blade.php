@include('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">


<body>
<section id="carrito">
    <h2 class="section-title">Carrito de Compras</h2>
    <div class="carrito-list">
        <h3>Productos en el Carrito</h3>
        <p>Cliente: {{$cliente->nombre}} {{$cliente->apellido}}</p>

        <p>Total de productos: {{ $pedido->item->count() }}</p>

    @foreach($pedido->item as $unItem)
            <div class="producto-item">
                <span>Nombre: <a href="/productos/{{$unItem->producto->id_producto}}" style="color : black">{{$unItem->producto->nombre_producto}}</a></span>
                <span>Cantidad: {{$unItem->cantidad}}</span> <!-- Suponiendo que 'cantidad' es un atributo de ProductoItem -->
                <span>Total: {{$unItem->total}}</span> <!-- Suponiendo que 'precio' es un atributo de Producto -->
                <button>Eliminar</button>
            </div>
        @endforeach
        <div>
            <strong>Total: {{$pedido->precio_total}}</strong>
        </div>
        <button >Proceder al Pago</button>
    </div>
</section>

</body>
