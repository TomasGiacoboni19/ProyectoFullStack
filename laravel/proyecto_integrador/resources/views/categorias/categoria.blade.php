<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link  rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/categoria.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <title>Categorias</title>
</head>
@include('header',['carrito'=>$carrito])
<body>
    <div class="tituloCategorias nunito-title">
        <span>{{$categoria->nombre_categoria}}</span>
    </div>
    <div class="row">
        @foreach($categoria->productos as $producto)
        <div class="col-lg-3 col-xl-3 col-md-3 col-sm-4  d-flex justify-content-center mt-5">
            <div class="carta ">
                <div class="carta-img"><div class="img"></div> <img src="{{asset('storage/'.$producto->foto_producto)}}" alt=""></div>
                <div class="carta-title">{{$producto->nombre_producto}}</div>
                <div class="carta-subtitle">{{$producto->descripcion_producto}}</div>
                <hr class="carta-divider">
                <div class="carta-footer">
                    <div class="carta-price"><span>$</span> {{$producto->precio_producto}}</div>
                    <button class="carta-btn">
                        <a href="/productos/{{$producto->id_producto}}" style="text-decoration: none; color: black;">VER</a>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
@include('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>

