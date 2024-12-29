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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfilUsuario.css')}}">
    <title>Mi perfil</title>
</head>
<body>
@include('header', ['carrito' => $carrito])

<section id="mi-perfil">
    <div class="perfil-info">
        <h3>Información Personal</h3>
        <hr>
        
        <div class="align-items-center container">
            <div class="row">
                <img src="/fotos/iconoPerfil.png" alt="" class="col-4 iconoPerfil">
                <div id="infoPersonal" class="col-8">
                    <label for="nombre"> Nombre: {{$cliente->nombre}} </label>
    
                    <label for="apellido">Apellido: {{$cliente->apellido}}</label>
    
                    <label for="email">Email: {{$cliente->mail}}</label>
    
                    <label for="usuario">Usuario: {{$cliente->usuario}}</label>
                </div>
            </div>
        </div>

        <div class="section-title">
            <span>opciones</span>
        </div>
            
        <div class="container listaOpciones">
            <div class="row filaOpcion">
                <div class="col-4 imagenOpcion">
                    <img src="/fotos/editarProducto.png" alt="Editar productos" class="fotoColumna">
                </div>
                <div class="col-8 opcion">
                    <a href="/clientes/{{ $cliente->id_cliente }}/productos">Ver mis productos</a>
                </div>
            </div>
            <div class="row filaOpcion">
                <div class="col-8 opcion">
                    <a href="/clientes/{{ $cliente->id_cliente }}/pedidos">Ver mis pedidos</a>
                </div>
                <div class="col-4 imagenOpcion">
                    <img src="/fotos/verPedidos.png" alt="Editar productos" class="fotoColumna">
                </div>
            </div>
            <div class="row filaOpcion">
                <div class="col-4 imagenOpcion">
                    <img src="/fotos/editarPerfil.png" alt="Editar productos" class="fotoColumna">
                </div>
                <div class="col-8 opcion">
                    <a href="/clientes/{{ $cliente->id_cliente }}/editar">Editar mi perfil</a>
                </div>
            </div>
        </div>
            
            
            
    </div>
</section>
@include('footer')

