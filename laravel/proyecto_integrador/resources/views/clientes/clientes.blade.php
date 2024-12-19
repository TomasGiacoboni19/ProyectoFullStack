@include('header')

<p>Clientes Actuales </p>
@foreach($usuarios as $cliente)
    <a href="clientes/{{$cliente->id_cliente}}"><p>Nombre: {{$cliente->nombre}}</p></a>
@endforeach

