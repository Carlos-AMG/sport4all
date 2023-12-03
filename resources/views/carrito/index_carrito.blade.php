<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <x-nav_bar/>

    <div class="container mt-4">
        <h1 class="mb-4">Carrito</h1>

        @forelse ($cartItems as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->producto->nombre }}</h5>
                    <p class="card-text">Cantidad: {{ $item->quantity }}</p>
                    <p class="card-text">Precio unitario: ${{ $item->producto->precio }}</p>
                    <p class="card-text">Subtotal: ${{ $item->quantity * $item->producto->precio }}</p>
                </div>
            </div>
        @empty
            <p>No hay productos en el carrito.</p>
        @endforelse

        <hr>

        <div class="text-right">
            <h5>Total: ${{ $total }}</h5>
        </div>

        <form action="{{ route('pay') }}" method="GET" class="mt-3">
            <button type="submit" class="btn btn-primary">Pagar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
