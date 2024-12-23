@include('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/editar_producto.css') }}">

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-3 text-success font-weight-bold">Pago Realizado</h1>
        <p class="lead text-muted">Tu pago se ha procesado con éxito y el pedido está listo para ser entregado.</p>
    </div>

    <!-- Información del pedido -->
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="font-weight-bold mb-0">Detalles del Pedido #{{ $pedido->id_pedido }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</p>
                    <p><strong>Fecha del Pedido:</strong> {{ $pedido->fecha_pedido}}</p>
                    <p><strong>Total del Pedido:</strong> ${{ number_format($pedido->precio_total, 2, ',', '.') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Estado del Pago:</strong>
                        <span class="badge bg-success text-white">Completado</span>
                    </p>
                    <p><strong>Forma de Pago:</strong> {{ $pedido->medioDePago->nombre }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de acción con un diseño limpio -->
    <div class="mt-5 text-center">
        <a href="/pedidos/{{$pedido->id_pedido}}" class="btn btn-outline-primary btn-lg mx-2">Ver mi pedido</a>
        <a href="/" class="btn btn-outline-secondary btn-lg mx-2">Volver al Inicio</a>
    </div>
</div>

