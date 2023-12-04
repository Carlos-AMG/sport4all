<div>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- marca details details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{$marca->nombre}}</h5>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('marcas/'.$marca->id)}}" style="width: 100px">Mostrar</a></div>
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('marcas/'.$marca->id.'/edit')}}" style="width: 100px">Editar</a></div>
                <div class="text-center">
                    <form action="{{url('marcas/'.$marca->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-outline-dark mt-auto" style="width: 100px">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>