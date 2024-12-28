<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link  rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{'css/login.css'}}">
    <title>Document</title>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif

@endif
<div class="container">
    <form action="login" class="form" method="POST">
        @csrf
        <p>
            Bienvenido!<span>Inicia Sesión para continuar</span>
        </p>
        <div class="separator">
            <div></div>
            <span><i class="bi bi-box-arrow-in-right"></i></span>
            <div></div>
        </div>
        <label for="usuario"></label>
        <input type="text" placeholder="Usuario" name="usuario" id="usuario" required>
        <label for="password"></label>
        <input type="text" name="password" id="password" placeholder="Contraseña"  required>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <button class="oauthButton" type="submit">
            Ingresar
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
        </button>
    </form>
</div>

<?php
echo password_hash("1234", PASSWORD_BCRYPT);
?>
</body>
</html>
