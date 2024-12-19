<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <title>Crear producto</title>
</head>
<body>
@include('header')

<h1>Crear Producto</h1>
<form action="/productos/crear" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre_producto" id="nombre" value="{{ old('nombre') }}" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio_producto" id="precio" step="0.01" value="{{ old('precio') }}" required>
    <br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock_producto" id="stock" value="{{ old('stock') }}" required>
    <br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>
