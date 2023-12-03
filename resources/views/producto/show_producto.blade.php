<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/show_producto.css')}}">

</head>
<body>
        <x-nav_bar/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="contenedor-mostrar-producto">
            <div class="contenedor-mostrar-lista">
                @if(Auth::check())
                    @if (auth()->user()->role != 'user')
                    <div class="contenedor-mostrar-lista-elemento">
                        <h3>{{$producto->id}}</h3>
                    </div>
                    @endif
                    
                @endif
                <div class="contenedor-mostrar-lista-elemento">
                    <img src="{{$producto->imagen}}" alt=""/>
                </div>
                <div class="contenedor-mostrar-lista-elemento">
                    <h3>{{$producto->nombre}}</h3>
                </div>
                <div class="contenedor-mostrar-lista-elemento">
                    <h4>Precio: ${{$producto->precio}}</h4>
                </div>
                <div class="contenedor-mostrar-lista-elemento">
                    <h4>Existencias: {{$producto->existencia}}</h4>
                </div>
                <div class="contenedor-mostrar-lista-elemento">
                    <h4>Descripcion: {{$producto->descripcion}}</h4>
                </div>
                <div class="contenedor-mostrar-lista-elemento">
                    <h4>Departamento: {{$producto->departamento->nombre}}</h4>
                </div>
            </div>
            @if(Auth::check())
                @if (auth()->user()->role != 'user')
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('producto/'.$producto->id.'/edit')}}">Editar</a></div>
                    <div class="text-center">
                        <form action="{{url('producto/'.$producto->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-outline-dark mt-auto">Eliminar</button>
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <form method="post" action="{{ route('cart.addToCart', ['product' => $producto->id]) }}">
                            @csrf
                            <input type="number" id="cantidad" name="cantidad"/>
                            <button type="submit" class="btn btn-outline-dark mt-auto">Añadir al Carrito</button>
                        </form>
                    </div>
                @endif
            @endif
            <div class="text-center"><a class="btn btn-outline-dark" href= "{{route('producto.index')}}">Regresar</a></div>
        </div>
        
</body>
</html>