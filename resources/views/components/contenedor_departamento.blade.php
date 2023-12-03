<div>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Departament details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{$departamento->nombre}}</h5>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('departamento/'.$departamento->id)}}" style="width: 100px">Mostrar</a></div>
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('departamento/'.$departamento->id.'/edit')}}" style="width: 100px">Editar</a></div>
                <div class="text-center">
                    <form action="{{url('departamento/'.$departamento->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-outline-dark mt-auto" style="width: 100px">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>