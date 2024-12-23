@include('header')
<section id="mis-compras">
    <h2 class="section-title">Mis Compras</h2>
    <div class="compras-list">
        <h3>Historial de Compras</h3>
        @if($pedidos->isEmpty())
            <p>No tienes compras registradas.</p>
        @else
            <ul>
                @foreach($pedidos as $pedido)
                    <li>
                        <strong>Fecha del pedido:</strong> {{ $pedido->fecha_pedido }}<br>
                        <strong>Carrito de compra:</strong> @if($pedido->carritoDisponible) ABIERTO @else CERRADO @endif <br>
                        <strong>Estado del pedido:</strong> @if(!$pedido->entregado) NO ENTREGADO @else ENTREAGO @endif <br>
                        <strong>Total:</strong> ${{ number_format($pedido->precio_total, 2) }}
                        <a href="/pedidos/{{$pedido->id_pedido}}"><p><strong style="color: #18181b"> Ver el pedido </strong></p></a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
@include('footer')
