@include('header')
<section id="mi-perfil">
    <h2 class="section-title">Mi Perfil</h2>
    <div class="perfil-info">
        <h3>Información Personal</h3>
        <label for="nombre"> Nombre:{{$cliente->nombre}} </label>

        <label for="apellido">Apellido:{{$cliente->apellido}}</label>

        <label for="email">Email:{{$cliente->email}}</label>

        <label for="usuario">Usuario:{{$cliente->usuario}}</label>


        <button>Guardar Cambios</button>
    </div>
</section>
@include('footer')

