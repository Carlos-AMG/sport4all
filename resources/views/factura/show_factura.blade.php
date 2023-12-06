<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles factura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <x-nav_bar/>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalles de la Factura</h3>
                <h3 class="card-text">Id de factura: {{$factura->id}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Productos:</h4>
                @if(count($factura->productos) > 0)
                    <table class="table">
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
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('factura/') }}" class="btn btn-outline-dark mt-3">Regresar</a>
                <a href="{{ url('descargarFactura', ['factura' => $factura->id]) }}" class="btn btn-outline-dark mt-3">Descargar factura</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
