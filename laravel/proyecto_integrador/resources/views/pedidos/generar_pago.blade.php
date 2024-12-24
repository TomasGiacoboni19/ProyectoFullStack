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
<h1>Seleccionar Método de Pago</h1>
<p>Total a pagar: ${{ $pedido->precio_total }}</p>
<form action="/pagos/{{$pedido->id_pedido}}" method="POST">
    @csrf
    @method("POST")
    <input type="hidden" name="pedido_id" value="{{ $pedido->id_pedido }}">
    <input type="hidden" name="total" value="{{ $pedido->id_pedido  }}">
    <label for="metodo">Método de Pago:</label>
    <select name="metodo" id="metodo" required>
        @foreach($medioDePagos as $medio)
        <option value="{{$medio->id_medio_pago}}">{{$medio->nombre}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Confirmar Pago</button>
</form>

@include('footer')
</body>
</html>
