<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registrar Compra</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('compra.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="fecha">Fecha de Compra:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}">
                    </div>

                    <div class="form-group">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" id="proveedor" class="form-control" value="{{ old('proveedor') }}">
                    </div>

                    <!-- Agregar detalles de productos -->
                    <label>Detalles de Productos:</label>
                    <div id="detalles-productos">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="nombre">Nombre del Producto:</label>
                                    <input type="text" name="productos[0][nombre]" class="form-control" placeholder="Nombre del Producto">
                                </div>
                                <div class="col">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" name="productos[0][cantidad]" class="form-control" placeholder="Cantidad">
                                </div>
                                <div class="col">
                                    <label for="precio_unitario">Precio Unitario:</label>
                                    <input type="number" name="productos[0][precio_unitario]" class="form-control" placeholder="Precio Unitario">
                                </div>
                                <div class="col">
                                    <label for="marca">Marca:</label>
                                    <select name="productos[0][marca]" class="form-control">
                                        @foreach($marcas as $marca)
                                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="departamento">Departamento:</label>
                                    <select name="productos[0][departamento]" class="form-control">
                                        @foreach($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success" id="agregar-detalle">Agregar Producto</button>

                    <button type="submit" class="btn btn-primary mt-3">Registrar Compra</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Código jQuery para agregar dinámicamente detalles de productos
        $(document).ready(function () {
            $("#agregar-detalle").click(function () {
                var detalleProducto = $("#detalles-productos .form-group:first").clone();
                detalleProducto.find("input").val(""); // Limpiar los valores
                $("#detalles-productos").append(detalleProducto);
            });
        });
    </script>
</body>
</html>
