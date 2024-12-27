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

    <title>Mi perfil</title>
</head>
<body>
@include('header', ['carrito' => $carrito])

<section id="mi-perfil">
    <h2 class="section-title">Mi Perfil</h2>
    <div class="perfil-info">
        <h3>Información Personal</h3>
        <label for="nombre"> Nombre: {{$cliente->nombre}} </label>

        <label for="apellido">Apellido: {{$cliente->apellido}}</label>

        <label for="email">Email: {{$cliente->mail}}</label>

        <label for="usuario">Usuario: {{$cliente->usuario}}</label>

        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/productos" style="color: black;">Ver mis productos</a>
        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/pedidos" style="color: black;">Ver mis pedidos</a>
        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/editar" style="color: black;">Editar mi perfil</a>


    </div>
</section>
@include('footer')

