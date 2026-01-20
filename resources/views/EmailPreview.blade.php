<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Pago</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #4a4a4a;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #4facfe;
            margin-bottom: 15px;
        }
        .details {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: #f8faff;
            font-size: 13px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #e0e0e0;
            padding: 10px;
        }
        table th {
            background-color: #f4f7fc;
            font-weight: 600;
        }
        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <h1>¡Gracias por tu compra!</h1>
    </div>

    <div class="content">
        <h2>Detalles del Pago</h2>

        <p>
            Hola <strong>{{ $customer ?? 'Cliente' }}</strong>,
        </p>

        <p>
            Hemos recibido tu pago exitosamente. Estos son los detalles de tu compra:
        </p>

        <div class="details">
            <p><strong>Fecha de Compra:</strong> {{ $created_at ?? '-' }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $email ?? '-' }}</p>
            <p><strong>Número de Orden:</strong> {{ $order_number ?? '-' }}</p>
            <p><strong>Método de Pago:</strong> {{ $payment_method ?? '-' }}</p>
            <p><strong>Estado del Pago:</strong> {{ $order_status ?? '-' }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products ?? [] as $product)
                    <tr>
                        <td>{{ $product['name'] ?? '-' }}</td>
                        <td>{{ $product['quantity'] ?? 0 }}</td>
                        <td>${{ number_format($product['price'] ?? 0, 2) }}</td>
                        <td>${{ number_format($product['subtotal'] ?? 0, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;">
                            No hay productos registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>${{ number_format($total ?? 0, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        <p style="margin-top:20px;">
            Si tienes alguna pregunta, responde este correo y con gusto te ayudaremos.
        </p>

        <p>
            ¡Gracias por confiar en nosotros!
        </p>
    </div>

    <div class="footer">
        <p>&copy; {{ now()->year }} Prueba. Todos los derechos reservados.</p>
    </div>

</div>
</body>
</html>
