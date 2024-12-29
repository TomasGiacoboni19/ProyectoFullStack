<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="js/splide-4.1.3/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{asset('css/home.css') }}">
    <title>Dolce Banana</title>
</head>
@include('header')
<body>
<div class="image-container">
<img src="fotos/fondo.gif" alt="fondo" id="fondo" >
    <p>DOLCE BANANA<img width="96" height="96" src="https://img.icons8.com/fluency/96/banana.png" alt="banana"/></p>
</div>
<section id="historia">
        @include('historia')
</section>

<section id="locales">
        @include('locales')
</section>

<section id="categorias">
    @include('categorias.categorias')
</section>

<section id="slider">
    @include('slider')
</section>

<section id="nosotros">
        @include('nosotros')
</section>

@include('footer')

</body>
</html>
