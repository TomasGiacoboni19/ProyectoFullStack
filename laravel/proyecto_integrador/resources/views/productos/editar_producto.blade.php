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

    <title>Editar producto</title>
</head>
<body>
@include('header')
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
            <p>Nombre actual: {{$producto->nombre_producto}}</p>

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
            <p>Precio actual: {{$producto->precio_producto}}</p>

            <!-- Stock -->
            <label for="editar-stock">Stock:</label>
            <input
                type="number"
                id="editar-stock"
                name="stock"
                value="{{ old('stock', 1 ) }}"
                min="0"
                required>
            <p>Stock actual: {{$producto->stock_producto}}</p>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>

<!-- Botón Volver -->
<a href="/productos/{{ $producto->id_producto }}" class="btn btn-secondary">Volver atrás</a>
@include('footer')
</body>
</html>
