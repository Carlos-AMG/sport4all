<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <x-nav_bar />

    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registrar Producto</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('producto.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre de producto:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                    </div>

                    <div class="form-group">
                        <label for="existencia">Existencias:</label>
                        <input type="number" name="existencia" id="existencia" class="form-control" value="{{ old('existencia') }}">
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen URL:</label>
                        <input type="url" name="imagen" id="imagen" class="form-control" placeholder="https://example.com/image.jpg">
                    </div>

                    <div class="form-group">
                        <label for="departamento_id">Departamento:</label>
                        <select name="departamento_id" id="departamento_id" class="form-control">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="marca_id">Marca:</label>
                        <select name="marca_id" id="marca_id" class="form-control">
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                        <a href="{{ route('producto.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
