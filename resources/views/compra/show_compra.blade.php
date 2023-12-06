<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <x-nav_bar/>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalles de la Compra #{{ $compra->id }}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Productos:</h4>
                @if(count($compra->productos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Subtotal por producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalCompra = 0;
                            @endphp
                            @foreach($compra->productos as $producto)
                                @php
                                    $totalProducto = $producto->pivot->cantidad * $producto->pivot->precio_unitario;
                                    $totalCompra += $totalProducto;
                                @endphp
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->pivot->cantidad }}</td>
                                    <td>{{ $producto->pivot->precio_unitario }}</td>
                                    <td>{{ $totalProducto }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total de la compra: ${{ $totalCompra }}</p>
                @else
                    <p>No hay productos en esta compra.</p>
                @endif
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('compra/') }}" class="btn btn-outline-dark mt-3">Regresar</a>
                <!-- Puedes ajustar el enlace según tus necesidades para descargar la factura de compra -->
                <a href="{{ url('descargarCompra', ['compra' => $compra->id]) }}" class="btn btn-outline-dark mt-3">Descargar compra</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
