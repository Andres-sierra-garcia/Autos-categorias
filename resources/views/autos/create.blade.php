<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar nuevo auto</title>
</head>
<body>
    <div class="container mt-5"> <!-- Agrega un contenedor para centrar y dar margen -->
        <h5 class="mb-4">Registrar auto</h5>
        <form id="formEditarRegistro" action="{{ route('autos.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="campo1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="campo1" name="nombre" placeholder="Nombre de la categoría" required>
            </div>

            <div class="mb-3">
                <label for="campo2" class="form-label">Descripción</label>
                <textarea class="form-control" id="campo2" name="descripcion" placeholder="Digita una descripcion" required></textarea>
            </div>

            <div class="mb-3">
                <label for="campo3" class="form-label">Marca</label>
                <input type="text" class="form-control" id="campo3" name="marca" placeholder="Marca del auto" required>
            </div>

            <div class="mb-3">
                <label for="campo4" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="campo4" name="modelo" placeholder="Modelo del auto" required>
            </div>

            <div class="mb-3">
                <label for="campo5" class="form-label">Categoría</label>
                <select class="form-select" id="campo5" name="categoria_id" required>
                    <option value="" disabled selected>Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        <div class="mt-3">
            <a href="/" class="btn btn-secondary">Cerrar</a>
        </div>
    </div>
</body>
</html>