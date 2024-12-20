@include('header')

<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">

<body>
<section id="editar-producto">
    <h2 class="section-title">Editar Producto</h2>
    <div class="producto-form">
        <form action="/productos/{{ $producto->id_producto }}/editar" method="POST">
            @csrf
            @method("PUT")

            <!-- Nombre del Producto -->
            <label for="nombre_producto">Nombre del Producto:</label>
            <input
                type="text"
                id="nombre_producto"
                name="nombre_producto"
                value="{{ old('nombre_producto', $producto->nombre_producto) }}"
                autocomplete="off"
                required>

            <!-- Precio -->
            <label for="precio_producto">Precio:</label>
            <input
                type="number"
                id="precio_producto"
                name="precio_producto"
                value="{{ old('precio_producto', $producto->precio_producto) }}"
                step="0.01"
                min="0"
                required>

            <!-- Stock -->
            <label for="editar-stock">Stock:</label>
            <input
                type="number"
                id="editar-stock"
                name="stock"
                value="{{ old('stock', $producto->stock ?? 20) }}"
                min="0"
                required>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>
</body>
<!-- Botón Volver -->
<a href="/productos/{{ $producto->id_producto }}" class="btn btn-secondary">Volver atrás</a>
