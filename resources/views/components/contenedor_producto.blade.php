<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="{{ $producto->imagen }}" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $producto->nombre }}</h5>
                <!-- Product price-->
                <p>Precio: ${{ $producto->precio }}</p>
                <p>Existencias: {{ $producto->existencia}}</p>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            @if (Auth::check())
                @if (auth()->user()->role == 'user')
                    <div class="text-center">
                        <form method="post" action="{{ route('cart.addToCart', ['product' => $producto->id]) }}">
                            @csrf
                            <input type="number" id="cantidad" name="cantidad" placeholder="cantidad" style="width: 160px"/>
                            <button type="submit" class="btn btn-outline-dark mt-auto" style="width: 160px">Añadir al Carrito</button>
                        </form>
                    </div>
                @else
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('producto/'.$producto->id.'/edit')}}" style="width: 160px">Editar</a></div>
                    <div class="text-center">
                        <form action="{{url('producto/'.$producto->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-outline-dark mt-auto" style="width: 160px">Eliminar</button>
                        </form>
                    </div>
                @endif
            @endif
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto" href="{{ route('producto.show', ['producto' => $producto->id]) }}" style="width: 160px">Mostrar</a>
            </div>
        </div>
    </div>
</div>