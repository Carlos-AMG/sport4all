<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-bfsApXa1ZL3+dqYcCziFq3g20e7/uAWUAdy2YH1x6o1UW0/Xj4QYoM7ZNm9iwlj" crossorigin="anonymous">
</head>
<body>
    <x-nav_bar/>
    <div class="container mt-5">
        <h1>Facturas</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($facturas as $factura)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Fecha: {{ $factura->fecha }}</h5>
                            <p class="card-text">Id: {{$factura->id}}</p>
                            <p class="card-text">Productos:</p>
                            <ul class="list-group list-group-flush">
                                @php
                                    $totalFactura = 0;
                                @endphp
                                @foreach ($factura->productos as $producto)
                                    @php
                                        $subtotalProducto = $producto->pivot->cantidad * $producto->precio;
                                        $totalFactura += $subtotalProducto;
                                    @endphp
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>{{ $producto->nombre }}</span>
                                            <span class="badge bg-secondary">{{ $producto->pivot->cantidad }}</span>
                                            <span class="badge bg-success">Subtotal: ${{ number_format($subtotalProducto, 2) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <p class="font-weight-bold">Subtotal: ${{ number_format($totalFactura, 2) }}</p>
                            <p class="font-weight-bold">IVA ({{ $factura->iva }}%): ${{ number_format(($totalFactura * $factura->iva) / 100, 2) }}</p>
                            <p class="font-weight-bold">Total de la factura: ${{ number_format($totalFactura + ($totalFactura * $factura->iva) / 100, 2) }}</p>
                            <a href="{{ route('factura.show', ['factura' => $factura->id]) }}" class="btn btn-outline-dark" style="width: 100%">Mostrar Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-eLDBdEph0Lh7pJg0JgxS+IKqB5F8J3z4NR3t3uMAf3"></script>
</body>
</html>
