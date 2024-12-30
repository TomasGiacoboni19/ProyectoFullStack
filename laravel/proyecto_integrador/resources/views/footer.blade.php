<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Sección Dolce Banana -->
            <div class="col-md-4 mb-4">
                <h3 class="text-uppercase text-success"><a href="{{ url('/') }}#home">Dolce Banana</a> <img src="{{ asset('fotos/logoNuevo.png') }}" alt="Logo" class="logo"></h3>
                <ul class="list-unstyled">
                    <li><img src="https://img.icons8.com/ios/50/open-book--v1.png" alt="Historia" class="custom-icon"><a href="{{ url('/') }}#historia">Nuestra Historia</a></li>
                    <li><i class="bi bi-geo-alt"></i><a href="{{ url('/') }}#locales" >Locales</a></li>
                    <li><img src="https://img.icons8.com/wired/64/categorize.png" alt="Categorias" class="custom-icon"/><a href="{{ url('/') }}#categorias" >Categorias</a></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/30/group.png" alt="Nosotros" class="custom-icon"><a href="{{ url('/') }}#nosotros" >Nosotros</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h3 class="text-uppercase">Interes</h3>
                <ul class="list-unstyled">
                    <li><a href="/clientes/{{auth()->user()->id_cliente}}" class="text-white">Mi cuenta</a></li>
                    <li><a href="{{ url('/productos') }}" class="text-white">Productos</a></li>
                    @if(!empty(auth()->user()->id_cliente))
                        <li><a href="/clientes/{{auth()->user()->id_cliente}}/pedidos" class="text-white">Pedidos</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h3 class="text-uppercase">Información Adicional</h3>
                <ul class="list-unstyled">
                   <li><a href="{{ url('/') }}#home" class="text-white">Home</a></li>
                    <li><a href="condiciones-compra.html" class="text-white">Email</a></li>

                </ul>
            </div>
        </div>

        <div class="text-center mt-3">
            <p class="mb-0">DolceBanana©2025. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
