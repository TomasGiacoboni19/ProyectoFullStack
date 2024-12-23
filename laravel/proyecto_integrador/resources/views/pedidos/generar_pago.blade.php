@include('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">


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
