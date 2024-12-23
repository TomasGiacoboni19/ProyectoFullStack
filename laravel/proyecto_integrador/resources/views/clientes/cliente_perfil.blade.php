@include('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">

<section id="mi-perfil">
    <h2 class="section-title">Mi Perfil</h2>
    <div class="perfil-info">
        <h3>Información Personal</h3>
        <label for="nombre"> Nombre: {{$cliente->nombre}} </label>

        <label for="apellido">Apellido: {{$cliente->apellido}}</label>

        <label for="email">Email: {{$cliente->mail}}</label>

        <label for="usuario">Usuario: {{$cliente->usuario}}</label>

        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/productos" style="color: black;">Ver mis productos</a>
        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/pedidos" style="color: black;">Ver mis pedidos</a>
        <br>
        <a href="/clientes/{{ $cliente->id_cliente }}/editar" style="color: black;">Editar mi perfil</a>


    </div>
</section>
@include('footer')

