<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">

    <title>Productos</title>
</head>
<body>
@include('header')

<main class="container my-5">
    <h1 class="text-center mb-4">Productos que tenemos</h1>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($productos as $producto)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Imagen del producto -->
                            @if(empty($producto->foto_producto))
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="Imagen no disponible">
                            @else
                                <img class="card-img-top" src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto del producto">
                            @endif
                            <!-- Detalles del producto -->
                            <div class="card-body p-4 text-center">
                                <h5 class="fw-bold">Nombre: {{ $producto->nombre_producto }}</h5>
                                <p>Precio: ${{ $producto->precio_producto }}</p>
                                <p>Categoría: {{ $producto->categoria->nombre_categoria }}</p>
                            </div>
                            <!-- Enlace de compra -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                <a class="btn btn-outline-dark mt-auto" href="/productos/{{ $producto->id_producto }}">Comprar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@include('footer')

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
