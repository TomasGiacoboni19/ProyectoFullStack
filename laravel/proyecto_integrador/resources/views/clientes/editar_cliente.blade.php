<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfilUsuario.css')}}">
    <title>Editar Cliente</title>
</head>
<body>
@include('header', ['carrito' => $carrito])

<section id="editar-perfil" class="container mt-4">
    <div class="encabezado">
        <h3>Editar Información Personal</h3>
        <img src="{{ asset('fotos/datosPerfil.png') }}" alt="fotoEditar" class="fotoPequenia">
    </div>
    <hr>
    <form action="/clientes/{{ $cliente->id_cliente }}/actualizar" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label" style="color:white;">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $cliente->nombre }}" >
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label" style="color:white;">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $cliente->apellido }}" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label" style="color:white;">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $cliente->mail }}" >
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label" style="color:white;">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $cliente->usuario }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="/clientes/{{ $cliente->id_cliente }}" class="btn btn-secondary">Cancelar</a>
    </form>
</section>

@include('footer')
</body>
</html>
