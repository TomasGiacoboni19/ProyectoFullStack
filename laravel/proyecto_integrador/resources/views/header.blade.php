<body>
    <header>
        <div class="ofertas-deslizando">
            {{-- algo --}}
        </div>
        <div class="container-fluid bloque-login">
            <div class="row align-items-center">
                <div class="col-4 d-flex align-items-center gap-3">
                    <a href="">
                        <img src= {{ asset("fotos/logo.png") }} alt="logo">
                    </a>
                    <a href="productos">CATEGORIAS</a>
                    <a href="">COLECCION TEMPORADA</a>
                    <a href="">¿QUIENES SOMOS?</a>
                    <a href="">LOCALES</a>
                </div>
                <div class="col-4">
                    <span class="input-group-text bg-white icono">
                        <i class="bi bi-search"></i>
                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Buscar">
                    </span>
                </div>
                <div class="col-4 cuenta">
                    @auth
                        <div class="iniciar-sesion">
                            <i class="bi bi-person-circle"></i>
                            <a href="/logout">
                                <button class="btn btn-outline-light">Cerrar Sesion</button>
                            </a>
                        </div>
                        <div class="carrito">
                            <i class="bi bi-cart"></i>
                            <p style="margin: 0">0</p>
                        </div>
                    @else
                    <div class="iniciar-sesion">
                        <i class="bi bi-person-circle"></i>
                        <a href="login">
                            <button class="btn btn-outline-light">Iniciar sesión</button>
                        </a>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </header>
