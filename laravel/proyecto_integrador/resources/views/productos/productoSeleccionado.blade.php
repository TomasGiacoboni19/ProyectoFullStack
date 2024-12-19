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

<h1>Selecciona o busca un producto</h1>
<form action="/productos/seleccionado" method="POST">
    @csrf
    <label for="nombre_producto">Nombre del producto:</label>
    <input type="text" name="nombre_producto" id="nombre_producto" value="{{ old('nombre_producto') }}" required>
    <br>
    <button type="submit">Enviar</button>
</form>


<p>Producto seleccionado</p>
@if($producto)
    <p>Nombre: {{$producto->nombre_producto}}</p>
    <p>Precio: {{$producto->precio_producto}}</p>
@else
    <p>No se encontró ningún producto con ese nombre.</p>
@endif

</body>
</html>
