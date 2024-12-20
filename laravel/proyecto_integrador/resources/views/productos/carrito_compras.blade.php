@include('header')


<body>
<section id="carrito">
    <h2 class="section-title">Carrito de Compras</h2>
    <div class="carrito-list">
        <h3>Productos en el Carrito</h3>
            @foreach($pedido as $item)
        <div class="producto-item">
            <span>Nombre: {{item->producto->nombre}}</span>
            <span>Cantidad: {{item->producto->nombre}}</span>
            <span>Total: {{item->producto->total}}</span>
            <button>Eliminar</button>
        </div>
            @endforeach
        <div>
            <strong>Total: {{$pedido->total}}</strong>
        </div>
        <button>Proceder al Pago</button>
    </div>
</section>
</body>
@include('footer')
