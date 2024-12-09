<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
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
                    <a href="">
                        <img src="fotos/logo.png" alt="logo">
                    </a>
                    <a href="">CATEGORIAS</a>
                    <a href="">COLECCION TEMPORADA</a>
                    <a href="">¿QUIENES SOMOS?</a>
                    <a href="">LOCALES</a>
                </div>
                <div class="col-4">
                    <span class="input-group-text bg-white icono">
                        <i class="bi bi-search"></i>
                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Buscar">
                    </span>
                </div>
                <div class="col-4 cuenta">
                    <div class="iniciar-sesion">
                        <i class="bi bi-person-circle"></i>
                        <a href="">
                            <button>Iniciar sesión</button>
                        </a>
                    </div>
                    <div class="carrito">
                        {{-- De alguna forma obtiene el valor --}}
                        <i class="bi bi-cart"></i>
                        <p style="margin: 0">$ 0</p>
                    </div>
                </div>
            </div>
        </div>
    </header>