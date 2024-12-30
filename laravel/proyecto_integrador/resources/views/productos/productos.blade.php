<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{asset('css/categoria.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  <!--Efectos WOW -->

    <title>Productos</title>
</head>
@include('header',['carrito'=>$carrito])
<body>
<div class="tituloCategorias">
    <span class="nunito-title">Productos</span>
</div>
<div class="row">
    @foreach($productos as $producto)
        <div class="col-lg-3 col-xl-3 col-md-3 col-sm-4 d-flex justify-content-center mt-5">
            <section class="wow animate__fadeIn " data-wow-duration="2s" data-wow-delay ="0.3s">
            <div class="carta ">
                <div class="carta-img"><div class="img"></div> <img src="{{asset('storage/'.$producto->foto_producto)}}" alt=""></div>
                <div class="carta-title">{{$producto->nombre_producto}}</div>
                <div class="carta-subtitle">{{$producto->descripcion_producto}}.</div>
                <hr class="carta-divider">
                <div class="carta-footer">
                    <div class="carta-price"><span>$</span> {{$producto->precio_producto}}</div>
                    <button class="carta-btn">
                        <a style="text-decoration: none; color: black;" href="/productos/{{$producto->id_producto}}">VER</a>
                    </button>
                </div>
            </div>
            </section>
        </div>
    @endforeach
</div>
</body>
@include('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>   <!--Efectos WOW -->
<script src="{{asset('js/wow.js')}}"></script>   <!--Efectos WOW -->


</html>

