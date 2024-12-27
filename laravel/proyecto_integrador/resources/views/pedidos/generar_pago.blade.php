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

    <title>Pago del pedido</title>
</head>
<body>
@include('header')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4 text-primary">
            <i class="bi bi-wallet2"></i> Seleccionar Método de Pago
        </h1>

        <p class="text-center fs-4">
            Total a pagar: <strong class="text-success">${{ number_format($pedido->precio_total, 2) }}</strong>
        </p>

        <form action="/pagos/{{$pedido->id_pedido}}" method="POST">
            @csrf
            <input type="hidden" name="pedido_id" value="{{ $pedido->id_pedido }}">
            <input type="hidden" name="total" value="{{ $pedido->precio_total }}">

            <!-- Método de Pago -->
            <div class="mb-4">
                <label for="metodo" class="form-label fw-bold">Método de Pago:</label>
                <select name="metodo" id="metodo" class="form-select" required>
                    <option value="" disabled selected>Seleccione un método</option>
                    @foreach($medioDePagos as $medio)
                        <option value="{{$medio->id_medio_pago}}">
                            {{$medio->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Dirección Favorita -->
            <div class="mb-4">
                <label for="favoritos" class="form-label fw-bold">Enviar a:</label>
                <select name="favoritos" id="favoritos" class="form-select">
                    <option value="" disabled selected>Selecciona un lugar favorito</option>
                    @foreach($favoritos as $favorito)
                        <option value="{{$favorito->id_direccion}}">
                            {{$favorito->localizacion->nombre}} - {{$favorito->nombre}} - {{$favorito->numero}}
                        </option>
                    @endforeach
                    <option value="0">Otra dirección</option>
                </select>
            </div>

            <!-- Dirección Personalizada -->
            <div id="nuevaDireccion" style="display: none;">
                <h5 class="fw-bold">Nueva Dirección:</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="localizacion" class="form-label">Ciudad:</label>
                        <select name="localizacion" id="localizacion" class="form-select">
                            @foreach($localizaciones as $localizacion)
                                <option value="{{$localizacion->id_localizacion}}">{{$localizacion->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="form-control"
                               placeholder="Ingresa tu dirección">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" id="numero" name="numero" class="form-control"
                           placeholder="Ingresa el número">
                </div>
            </div>

            <!-- Botón de Confirmación -->
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-check-circle-fill"></i> Confirmar Pago
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('favoritos').addEventListener('change', function () {
        const nuevaDireccion = document.getElementById('nuevaDireccion');
        const inputs = nuevaDireccion.querySelectorAll('input, select');
        if (this.value === '0') {
            nuevaDireccion.style.display = 'block';
            inputs.forEach(input => input.required = true);
        } else {
            nuevaDireccion.style.display = 'none';
            inputs.forEach(input => input.required = false);
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-cIgyIobUiwESzqDc1XILjDDaEegUsT4mLGfdLCZLGrq1GfMxa57iSEv/a7iQJywz" crossorigin="anonymous"></script>
@include('footer')
</body>
</html>
