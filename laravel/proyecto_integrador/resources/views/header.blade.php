<header>
    <div class="ofertas-deslizando text-center py-2">
        <p class="mb-0">¡Aprovecha nuestras ofertas por tiempo limitado!</p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('fotos/logo.png') }}" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/categorias">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="/productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/nosotros">¿Quiénes Somos?</a></li>
                    <li class="nav-item"><a class="nav-link" href="/locales">Locales</a></li>
                </ul>
                <form class="d-flex me-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input class="form-control" type="text" placeholder="Buscar" aria-label="Buscar">
                    </div>
                </form>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="/clientes/{{ auth()->user()->id_cliente }}" class="btn btn-outline-light me-2"><i class="bi bi-person-circle"></i></a>
                        <a href="/logout" class="btn btn-outline-light me-2">Cerrar Sesión</a>
                    @else
                        <a href="/login" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                    @endauth
                    <div class="position-relative">
                        <a href="/carrito" class="btn btn-outline-light">
                            <i class="bi bi-cart"></i>
                        </a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
