<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Eliminados</title>
    <style>
        /* Puedes agregar estilos según tus preferencias */
        .restore-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <x-nav_bar/>  
    
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productosEliminados as $producto)
                <div class="card mb-5 mx-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <!-- Otras propiedades del producto -->

                        <!-- Agregar el formulario de restauración -->
                        <form action="{{ route('producto.restore', ['producto' => $producto->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="restore-btn">Restaurar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>
