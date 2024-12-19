@include('header')
<body>
<p>Nombre: {{$producto->nombre_producto}}</p>
<p>Precio: {{$producto->precio_producto}}</p>
<p>Stock: {{$producto->stock_producto}}</p>

<a href="/productos/{{$producto->id_producto}}/editar">Editar el producto</a>

<form action="/carrito/agregar" method="POST">
    @csrf
    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
    <button type="submit">Agregar al carrito</button>
</form>

</body>
@include('footer')
