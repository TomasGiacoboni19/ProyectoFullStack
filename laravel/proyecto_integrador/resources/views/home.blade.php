<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>
@include('header')
    <img src="fotos/fondo.gif" alt="fondo" id="fondo">
    @php
    $cont = 1; 
    @endphp
    @foreach($productos as $producto)
    @if ($cont == 1)
    <input type="radio" id="s-1" name="slider-control" checked="checked">
    @else
    <input type="radio" id="s-{{$cont}}" name="slider-control">
    @endif
    @php
      $cont++;
    @endphp
    @endforeach
    @php
    $cont = 1; 
    @endphp
    @foreach($productos as $producto)
    @if($cont == 1)
    <div class="js-slider">
    @endif
      <figure class="js-slider_item img-{{$cont}}">
        <div class="js-slider_img">
          <img class="c-img-w-full" src="{{ asset('storage/' . $producto->foto_producto) }}" alt="...">
        </div>
        <figcaption class="wo-caption">
          <h3 class="wo-h3">
            <div class="c-label">${{$producto->precio_producto}}</div>
            <br class="view-sm mb-s">{{$producto->nombre_producto}}</h3>
          <ul class="wo-credit">
            <li>{{$producto->nombre_categoria}}</li>
            <li>{{$producto->stock_producto}}</li>
        </figcaption>
      </figure>
      @php
      $cont++;
      @endphp
    @endforeach
    <div class="js-slider_nav">
      {{--Los del primero siempre son iguales--}}
      <label class="js-slider_nav_item s-nav-{{1}} prev" for="s-{{count($productos)}}"></label> {{--anterior--}} 
      <label class="js-slider_nav_item s-nav-{{1}} next" for="s-2"></label> {{--siguiente--}}
    @for($i = 2; $i <= count($productos); $i++)
        @if($i!=count($productos))
        <label class="js-slider_nav_item s-nav-{{$i}} prev" for="s-{{$i-1}}"></label> {{--anterior--}} 
        <label class="js-slider_nav_item s-nav-{{$i}} next" for="s-{{$i+1}}"></label> {{--siguiente--}}
        @endif
        {{--Llegue al último elemento--}}
        <label class="js-slider_nav_item s-nav-{{$i}} prev" for="s-{{$i-1}}"></label> {{--anterior--}} 
        <label class="js-slider_nav_item s-nav-{{$i}} next" for="s-1"></label> {{--siguiente--}}
      </div>
    @endfor
      <div class="js-slider_indicator">
        @for($i = 1; $i <= count($productos); $i++)
        <div class="js-slider-indi indi-{{$i}}"></div>
        @endfor
      </div>
    </div>
@include('footer')
</body>
