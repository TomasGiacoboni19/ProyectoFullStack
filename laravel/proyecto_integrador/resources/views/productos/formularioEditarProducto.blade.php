<section id="editar-producto">
    <div class="producto-form oculto" id="editFormContainer">
        <div class="titulos">
            <h2 class="section-title">Editar Producto</h2>
            <button class="botonCerrar">
                <span class="X"></span>
                <span class="Y"></span>
                <div class="close">Cerrar</div>
            </button>
        </div>
        <hr>
        <form action="/productos/{{ $producto->id_producto }}/editar" method="POST" id="formularioEditar">
            @csrf
            @method("PUT")
            <!-- Nombre del Producto -->
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <label for="nombre_producto">Nombre del Producto:</label>
                        <input
                            type="text"
                            id="nombre_producto"
                            name="nombre_producto"
                            value="{{ old('nombre_producto', $producto->nombre_producto) }}"
                            autocomplete="off"
                            required>

                        <!-- Precio -->
                        <label for="precio_producto">Precio:</label>
                        <input
                            type="number"
                            id="precio_producto"
                            name="precio_producto"
                            value="{{ old('precio_producto', $producto->precio_producto) }}"
                            step="0.01"
                            min="0"
                            required>

                        <!-- Stock -->
                        <label for="stock_producto">Nuevo stock:</label>
                        <input
                            type="number"
                            id="stock_producto"
                            name="stock_producto"
                            value="{{ old('stock_producto', 1 ) }}"
                            min="0"
                            required>
                        
                        <!-- Descripcion -->
                        <label for="descripcion_producto">Descripcion:</label>
                            <input
                                type="text"
                                id="descripcion_producto"
                                name="descripcion_producto"
                                value="{{ old('descripcion_producto', $producto->descripcion_producto) }}"
                                min="0"
                                required>
                    </div>
                </div>
            </div>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-primary" id="form_agregar">Actualizar</button>
        </form>
    </div>
</section>