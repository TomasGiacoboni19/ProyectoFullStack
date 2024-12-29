$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
}); 

$(document).on('click', '.btn-editar', function (event) {
    event.preventDefault(); // Prevenir la redirección
    const productoId = $(this).data('id'); // Asegúrate de obtener el ID correcto // Debug para confirmar qué ID se está obteniendo
    mostrarFormularioEdicion(productoId); // Pasa el ID al formulario
});

function mostrarFormularioEdicion(productoId) {
    $.ajax({
        url: `/productos/${productoId}/json`, // Endpoint con el ID correcto
        type: 'GET',
        success: function (data) {
            console.log('Datos del producto:', data); // Debug para ver qué datos se reciben
            // Rellena los campos del formulario
            $('#formularioEditar').attr('action', `/productos/${productoId}`);
            $('#nombre_producto').val(data.nombre_producto);
            $('#precio_producto').val(data.precio_producto);
            $('#stock_producto').val(data.stock_producto);
            $('#descripcion_producto').val(data.descripcion_producto);
            $('#editFormContainer').show(); // Muestra el formulario
        },
        error: function () {    
            alert('Error al cargar los datos del producto');
        },
    });
}

$("#formularioEditar").submit((event) => {
    event.preventDefault();

    var nombre = $("#nombre_producto").val();
    var precio = $("#precio_producto").val();
    var stock = $("#stock_producto").val();
    var descripcion = $("#descripcion_producto").val();

    var direccion = $("#formularioEditar").attr('action');

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="CSRF-token"]').attr('content') },
        url: direccion,
        type: "PUT",
        data: {
            "nombre_producto": nombre, 
            "precio_producto": precio, 
            "stock": stock, 
            "descripcion_producto": descripcion,
            "_token": $("meta[name='CSRF-token']").attr("content")
        },
        success: function(response) {
            $('#editFormContainer').hide(); // Esconde el formulario
            console.log(response);

            var precioFormateado = new Intl.NumberFormat('es-AR', { style: 'currency', currency: 'ARS' }).format(response.precio_producto);

            $("#myTable tr[data-id='" + response.id_producto + "']") // Suponiendo que cada fila de la tabla tiene un 'data-id' con el ID del producto
                .find(".nombre_producto").text(response.nombre_producto)
                .end()
                .find(".precio_producto").text(precioFormateado)
                .end()
                // .find(".stock_producto").text(response.stock)
                // .end()
                .find(".descripcion_producto").text(response.descripcion_producto);
            
            // Mostrar mensaje de éxito
            $("#avisoBueno").show().fadeOut(3000); // Un mensaje de éxito que desaparece después de 3 segundos
        },
        error:function(x,xs,xt){
            //nos dara el error si es que hay alguno
            window.open(JSON.stringify(x));
            //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
});
