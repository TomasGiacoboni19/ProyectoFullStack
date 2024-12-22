@include('header')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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
    <select name="categorias" id="categorias">
        @foreach ($categorias as $categoria)
            <option value=""> {{$categoria->nombre_categoria}} </option>
        @endforeach
    </select>
    <br>
    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto">
    <br>
    <button type="submit">Guardar</button>
</form>
@include('footer')

