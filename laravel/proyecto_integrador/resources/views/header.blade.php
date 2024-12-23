<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="ofertas-deslizando">
            {{-- algo --}}
        </div>
        <div class="container-fluid bloque-login">
            <div class="row align-items-center">
                <div class="col-4 d-flex align-items-center gap-3">
                    <a href="/">
                        <img src="fotos/logo.png" alt="logo">
                    </a>
                    <a href="/categorias">CATEGORIAS</a>
                    <a href="/productos">PRODUCTOS</a>
                    <a href="/nosotros">¿QUIENES SOMOS?</a>
                    <a href="/locales">LOCALES</a>
                </div>
                <div class="col-4">
                    <span class="input-group-text bg-white icono">
                        <i class="bi bi-search"></i>
                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Buscar">
                    </span>
                </div>
                <div class="col-4 cuenta">
                    @auth
                        <div class="iniciar-sesion">
                            <a href="/clientes/{{ auth()->user()->id_cliente }}">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <a href="/logout">
                                <button class="btn btn-outline-light">Cerrar Sesion</button>
                            </a>
                        </div>
                        <div class="carrito">
                            <i class="bi bi-cart"></i>
                            <p style="margin: 0">0</p>
                        </div>
                    @else
                    <div class="iniciar-sesion">
                        <a href="/login">
                            <button class="btn btn-outline-light">Iniciar sesión</button>
                        </a>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </header>

