@include('header')

<p style="color: black;">PRODUCTOS QUE TENEMOS</p>
@foreach($productos as $producto)
    <a href="productos/{{$producto->id_producto}}" style="color: black;">
        <p style="color: black;">Nombre: {{$producto->nombre_producto}}</p>
    </a>
@endforeach

@include('footer')
