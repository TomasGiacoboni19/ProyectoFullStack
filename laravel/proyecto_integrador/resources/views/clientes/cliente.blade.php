@include('header')
    <body>

    <p>Nombre:  {{$cliente->nombre}}</p>
    <p>Apellido:  {{$cliente->apellido}}</p>
    <p>Mail:  {{$cliente->mail}}</p>

    <a href="/cliente/{{ $cliente->id_cliente }}/misProductos">Editar mis productos</a>

    </body>
@include('footer')
