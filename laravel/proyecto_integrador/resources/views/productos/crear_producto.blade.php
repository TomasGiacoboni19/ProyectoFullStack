@include('header')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h2>{{ $error }}</h2>
    @endforeach
@endif


<h1>Crear Producto</h1>
    <form action="/productos/crear" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre_producto" id="nombre" placeholder="Nombre de tu producto" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio_producto" id="precio" placeholder="Precio de tu producto" required>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock_producto" id="stock" placeholder="Stock de tu producto" required>
        <br>
        <label for="categorias">Categoría:</label>
        <select name="categoria_id" id="categorias">
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id_categoria}}"> {{$categoria->nombre_categoria}} </option>
            @endforeach
        </select>
        <br>
        <label for="foto_producto">Foto:</label>
        <input type="file" name="foto_producto" id="foto_producto">
        <br>
        <input type="hidden" name="vendedor_id" value= {{ auth()->user()->id_cliente }}>
        <button type="submit">Guardar</button>
    </form>
@include('footer')

