@include('header')


<div class="container py-md-5 container--narrow">
    <a href="/productos/{{$producto->id_producto}}" style="color: black;">Volver atras</a>
    <form action="/productos/{{ $producto->id_producto }}/editar" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="nombre_producto" class="text-muted mb-1"><small>Nombre:</small></label>
            <input value="{{ old('nombre_producto', $producto->nombre_producto) }}" type="text" class="form-control form-control-lg" id="nombre_producto" name="nombre_producto" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="precio_producto" class="text-muted mb-1"><small>Precio: </small></label>
            <input value="{{ old('precio_producto', $producto->precio_producto) }}" type="text" class="form-control form-control-lg" id="precio_producto" name="precio_producto" autocomplete="off">
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>

@include('footer')
