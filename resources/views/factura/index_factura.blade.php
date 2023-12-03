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
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($facturas as $factura)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $factura->fecha }}</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($factura->productos as $producto)
                                    <li class="list-group-item">
                                        <span>{{ $producto->nombre }}</span>
                                        <span class="badge bg-secondary">{{ $producto->pivot->cantidad }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('factura.show', ['factura' => $factura->id]) }}" class="btn btn-outline-dark" style="width: 100%">Mostrar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-eLDBdEph0Lh7pJg0JgxS+IKqB5F8J3z4NR3t3uMAf3wHqdKEQzk3UENnEQLa+fuX" crossorigin="anonymous"></script>
</body>
</html>
