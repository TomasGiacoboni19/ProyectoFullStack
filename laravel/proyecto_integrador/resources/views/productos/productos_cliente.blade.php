<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/productosCliente.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Mis productos</title>
</head>
<body>
@include('header', ['carrito' => $carrito])
    <div id="contenedorProductos">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    @if($productos->isEmpty())
        <div class="container d-flex justify-content-center align-items-center mt-5 min-vh-100 ">
                <span class="text">No tenes productos!</span>
        </div>
            @else
        <div class="container">
            <h1>Mis productos</h1>
            <table class="table table-striped table-hover" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                @if(empty($producto->foto_producto))
                                    <img class="fotoProd" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="Imagen no disponible">
                                @else
                                    <img class="fotoProd" src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto del producto">
                                @endif
                            </td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->descripcion_producto }}</td>
                            <td>${{ number_format($producto->precio_producto, 2) }}</td>
                            <td>
                                <a href="/productos/{{ $producto->id_producto }}/editar" class="btn btn-sm btn-primary">Editar</a>
                                <form action="/productos/{{ $producto->id_producto }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    <a href="/productos/crear">
        <button class="btn btn-sm btn-primary botonAgregar">
            <i class="bi bi-plus-lg"></i>
        </button>
    </a>
    </div>
@include('footer')
<script src={{asset("js/tablaProducto.js")}}></script>
</body>
</html>
