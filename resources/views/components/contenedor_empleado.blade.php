<div class="col mb-5">
    <div class="card h-100">
        
        <img class="card-img-top" src="{{ asset($empleado->profile_photo_path) }}" alt="..." />
        
        <div class="card-body p-4">
            <div class="text-center">
                
                <h5 class="fw-bolder">{{ $empleado->name }}</h5>
                
                <p>RFC: {{ $empleado->rfc }}</p>
                <p>Departamento: {{ $empleado->departamento->nombre}}</p>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            @if (Auth::check())
                @if (auth()->user()->role == 'admin')
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('empleado/'.$empleado->id.'/edit')}}">Editar</a></div>
                    <div class="text-center">
                        <form action="{{url('empleado/'.$empleado->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-outline-dark mt-auto">Eliminar</button>
                        </form>
                    </div>
                @endif
            @endif
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto" href="{{ url('empleado/'.$empleado->id) }}">Mostrar</a>
            </div>
        </div>
    </div>
</div>