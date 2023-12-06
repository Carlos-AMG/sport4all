<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
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
        #logo {
            max-width: 100px; /* Ajusta el tamaño del logo según tus necesidades */
        }
        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- <img id="logo" src="{{ public_path('assets/logo_inge.jfif') }}" alt="Logo"> -->
    <img src="{{asset('assets/sport4AllLogo.png')}}" alt="Logo" height="40" width="40" class="mr-2"> 


    <h1>Factura</h1>
    <p>Precio Total: ${{ number_format($precio, 2) }}</p>
    <p>Fecha: {{ $fecha }}</p>

    <h2>Productos:</h2>
    <ul>
        @foreach($cartItems as $item)
            <li>{{ $item['producto']->nombre }} - Cantidad: {{ $item['cantidad'] }} - Precio Unitario: ${{ number_format($item['precio'], 2) }}</li>
        @endforeach
    </ul>
</body>
</html>
