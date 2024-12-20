@include('header')
<body>
<p>Nombre: {{$producto->nombre_producto}}</p>
<p>Precio: {{$producto->precio_producto}}</p>
<p>Stock: {{$producto->stock_producto}}</p>

<a href="/productos/{{$producto->id_producto}}/editar">Editar el producto</a>

<form action="/carrito/agregar" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 300px;">
    @csrf
    <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">

    <!-- Etiqueta para cantidad -->
    <label for="cantidad" style="font-size: 16px; font-weight: bold;">Cantidad:</label>
    <input
        type="number"
        id="cantidad"
        name="cantidad"
        value="1"
        min="1"
        max="{{ $producto->stock_producto }}"
        required
        style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">

    <!-- Botón de agregar -->
    <button
        type="submit"
        style="background-color: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
        Agregar al carrito
    </button>
</form>


</body>
@include('footer')
