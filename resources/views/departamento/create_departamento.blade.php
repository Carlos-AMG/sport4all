<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Create Departament</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <x-nav_bar/>
    
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registrar Departamento</h5>
    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                <form action="{{ route('departamento.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre de Departamento:</label>
                        <input type="text" name="nombre" id="nombre_dep" class="form-control"  value="{{ old('nombre') }}">
                    </div>
    
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"> {{ old('descripcion') }} </textarea>
                    </div>
                    
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                        <a href="{{ route('departamento.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
