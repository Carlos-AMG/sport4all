<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <x-nav_bar/>
    
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Editar empleado</h5>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('producto.update',$empleado)}}" method="POST">
                    @method("PATCH")
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre del empleado:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"  value="{{$empleado->name}}">
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC del empleado:</label>
                        <input type="text" name="rfc" id="rfc" class="form-control"  value="{{$empleado->rfc}}">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo del empleado:</label>
                        <input type="email" name="correo" id="correo" class="form-control"  value="{{$empleado->email}}">
                    </div>
                    <div class="form-group">
                        <label for="rfc"> del empleado:</label>
                        <input type="text" name="rfc" id="rfc" class="form-control"  value="{{$empleado->rfc}}">
                    </div>

                    <div class="form-group">
                        <label for="departamento_id">Departamento:</label>
                        <select name="departamento_id" id="departamento_id" class="form-control" value='{{$empleado->departamento->nombre}}'>
                            @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                        <a href="{{ route('empleado.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>