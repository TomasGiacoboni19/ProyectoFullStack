@include('header')
<head>
<title>Formulario de Registro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">
</head>
<body>

@if ($errors->has('usuario'))
    <div class="alert alert-danger">
        {{ $errors->first('usuario') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h2>{{ $error }}</h2>
    @endforeach
@endif


<div class="container mt-5">
    <h2 class="mb-4">Formulario de Registro</h2>
    <form action="/clientes/registro" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu apellido" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa tu nombre de usuario" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" id="email" name="mail" class="form-control" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>
</body>
</html>
