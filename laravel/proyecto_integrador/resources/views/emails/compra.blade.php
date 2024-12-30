<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido realizado exitosamente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #0F172B;
            color: #FEA116;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            background-color: #0F172B;
            margin: 0;
            font-size: 24px;
        }
        .email-content {
            padding: 20px;
            color: #000000;
        }
        .email-content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        .email-content strong {
            color: #0047ab;
        }
        .email-logo {
            text-align: center;
            margin: 20px 0;
        }
        .email-logo img {
            width: 400px;
            border: none;
        }
        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666666;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #0F172B;
            color: #FEA116;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>¡Pedido realizado exitosamente!</h1>
    </div>
    <div class="email-content">
        <p>¡Gracias por tu compra en Dolce Banana! Nos alegra que hayas realizado un pedido con nosotros.</p>

        <!-- Tabla de detalles del pedido -->
        <table>
            <tr>
                <th>Codigo de seguimiento</th>
                <th>Fecha de compra</th>
                <th>Lugar de entrega</th>
                <th>Medio de pago</th>
                <th>Productos</th>
                <th>Total</th>

            </tr>
            <tr>
                <td>{{ $pedido->id_pedido }}</td>
                <td>{{ $pedido->fecha_compra }}</td>
                <td>{{
                        $pedido->direccion
                        ? ($pedido->direccion->localizacion->nombre ?? 'No especificado')
                          . ', ' . $pedido->direccion->nombre
                          . ' ' . $pedido->direccion->numero
                        : 'Dirección no disponible'
                    }}
                </td>
                <td>{{ $pedido->medioDePago->nombre ?? 'No especificado' }}</td>
                <td>
                    @foreach($pedido->item as $unItem)
                        {{$unItem->producto->nombre_producto}} ({{$unItem->cantidad}}) - ${{ number_format($unItem->total, 2) }}<br>
                    @endforeach
                </td>
                <td>${{ number_format($pedido->precio_total, 2) }}</td>

            </tr>
        </table>

        <p>Te confirmamos que tu pedido ha sido recibido y está siendo procesado. Nos pondremos en contacto contigo pronto para coordinar los detalles de la entrega.</p>
        <p>Si tienes alguna duda o necesitas más información, no dudes en contactarnos. ¡Estamos aquí para ayudarte!</p>

        <div class="email-logo">
            <img src="https://i.ibb.co/SN99zzq/Captura.png" alt="Logo Dolce Banana">
        </div>

        <p>Saludos cordiales,<br>El equipo de Dolce Banana</p>
    </div>
    <div class="email-footer">
        <p>&copy; 2024 Dolce Banana. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
