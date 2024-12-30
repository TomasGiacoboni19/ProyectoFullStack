<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link  rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/producto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <title>Producto</title>
</head>
@include('header', ['carrito' => $pedido])
<body>
<form action="/pedidos/{{$pedido->id_pedido}}/productos" method="POST" >
    @csrf
    <input type="hidden" name="producto_id" value="{{$producto->id_producto}}">
    <div class="container">
        <div class="carta">
            <div class="row">
                <div class=" col-12">
                    <div class="carta-img"><div class="img"></div> <img src="{{asset('storage/'.$producto->foto_producto)}}" alt=""></div>
                </div>
                <div class=" col-12">
                    <div class="carta-title">{{$producto->nombre_producto}}</div>
                    <div class="carta-subtitle descripcion mt-3">{{$producto->descripcion_producto}}</div>
                    <hr class="carta-divider">
                    <div class="opciones1">
                        <div class="carta-secondTitle">Unidades disponibles: {{$producto->stock_producto}}</div>
                        <div class="number-control">
                            <div class="carta-secondTitle">Cantidad a comprar: </div><input type="number" name="cantidad" id="cantidad" value="1" min="1" max="{{$producto->stock_producto}}" class="number-quantity carta-subtitle" require>                         
                        </div>
                    </div>
                    <div class="opciones2">
                        <div class="carta-secondTitle"><span>Costo unitario: $</span> {{$producto->precio_producto}}</div>
                        <div id="total" class="mt-3">
                            <p class="carta-secondTitle">TOTAL: </p>
                            <p id="total_precio" class="carta-secondTitle">$0.00</p>
                        </div> 
                    </div>  
                </div>
            </div>
            <hr class="carta-divider">
            <div class="carta-footer">
                
                @if($producto->estado == "Disponible")
                <button type="submit"  class="carta-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path><path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path></svg>
                </button>
                @else
                    <p>Producto eliminado</p>
                @endif
            </div>
        </div>
    </div>
</div>
</form>
@include('footer')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cantidadInput = document.getElementById('cantidad');
        const precioUnitario = {{$producto->precio_producto}}; // Precio unitario del producto desde Laravel
        const totalPrecio = document.getElementById('total_precio');

        // Función para actualizar el total
        const actualizarTotal = () => {
            const cantidad = parseInt(cantidadInput.value) || 0; // Obtiene la cantidad (0 si está vacío)
            const total = cantidad * precioUnitario;
            totalPrecio.textContent = `$${total.toFixed(2)}`; // Actualiza el total con formato de moneda
        };

        // Evento para cuando cambia el valor del input
        cantidadInput.addEventListener('input', actualizarTotal);

        // Calcula el total al cargar la página por defecto
        actualizarTotal();
    });
</script>

</body>
</html>

