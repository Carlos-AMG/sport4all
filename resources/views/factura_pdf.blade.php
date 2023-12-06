<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        #logo {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <img id="logo" src="{{ public_path('assets/sport4AllLogo.png') }}" alt="Logo">

    <h1>Factura</h1>
    <p>Id de factura: {{ $factura->id }}</p>
    <p>Fecha: {{ $factura->fecha }}</p>

    <h2>Productos:</h2>
    @if(count($factura->productos) > 0)
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total por producto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalCompra = 0;
                @endphp
                @foreach($factura->productos as $producto)
                    @php
                        $totalProducto = $producto->pivot->cantidad * $producto->precio;
                        $totalCompra += $totalProducto;
                    @endphp
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $totalProducto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Subtotal: ${{ $totalCompra }}</p>
        <p>IVA ({{ $factura->iva }}%): ${{ number_format(($totalCompra * $factura->iva) / 100, 2) }}</p>
        <p>Total de la compra: ${{ $totalCompra + ($totalCompra * $factura->iva) / 100 }}</p>
    @else
        <p>No hay productos en esta factura.</p>
    @endif
</body>
</html>
