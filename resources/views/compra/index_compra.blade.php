<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Add some styles for the fading effect */
        .fade {
            animation: fadeOut 5s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <x-nav_bar/>

    <div class="container px-4 px-lg-5 mt-5">
        @if(Session::has('success'))
            <div class="alert alert-success fade">
                {{ Session::get('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger fade">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($compras as $compra)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Fecha: {{ $compra->fecha }}</h5>
                                <p class="card-text">Proveedor: {{ $compra->proveedor }}</p>
                                <p class="card-text">Id: {{$compra->id}}</p>
                                @if ($compra->detalleCompras)
                                    <ul class="list-group list-group-flush">
                                        @php
                                            $totalCompra = 0;
                                        @endphp
                                        @foreach ($compra->detalleCompras as $detalleCompra)
                                            <li class="list-group-item">
                                                <span>{{ $detalleCompra->producto->nombre }}</span>
                                                <span class="badge bg-secondary">{{ $detalleCompra->cantidad }}</span>
                                                <span class="float-right">${{ $detalleCompra->subtotal }}</span>
                                            </li>
                                            @php
                                                $totalCompra += $detalleCompra->subtotal;
                                            @endphp
                                        @endforeach
                                    </ul>
                                    <p class="font-weight-bold mt-2">Total de la compra: ${{ $totalCompra }}</p>
                                @else
                                    <p>No hay detalles de compra para esta compra.</p>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('compra.show', ['compra' => $compra->id]) }}" class="btn btn-outline-dark" style="width: 100%">Mostrar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
