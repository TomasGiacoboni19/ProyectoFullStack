@include('header')
@if($productos->isEmpty())
    <h1>No tenes productos, agregalos desde <a href="/productos/crear">aca</a>.</h1>
@else 
    <h1>Mis productos</h1>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->descripcion_producto }}</td>
                    <td>${{ number_format($producto->precio_producto, 2) }}</td>
                    <td>
                        <a href="/productos/{{ $producto->id_producto }}/editar" class="btn btn-sm btn-primary">Editar</a>
                        <form action="/productos/{{ $producto->id_producto }}/eliminar" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

    
@include('footer')
