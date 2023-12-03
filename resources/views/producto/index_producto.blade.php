<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
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
        <!-- Display success message -->
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

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productos as $producto)
                <x-contenedor_producto :producto='$producto' />
            @endforeach
        </div>
    </div>
    
</body>
</html>