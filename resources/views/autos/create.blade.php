<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Registrar Nuevo Auto</h1>

        <form action="/autos" method="POST">
            <input type="hidden" name="_token" value="TU_TOKEN_CSRF_AQUI">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Ej: Toyota" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="anio" class="form-label">Año:</label>
                    <input type="number" class="form-control" id="anio" name="anio" min="1900" max="2099" step="1" value="2024" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Ej: Blanco" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="categoria_id" class="form-label">Categoría:</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="1">Urbano</option>
                        <option value="2">Sedán</option>
                        <option value="3">SUV</option>
                        <option value="4">Deportivo</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" placeholder="Ej: 25000.00" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="kilometraje" class="form-label">Kilometraje:</label>
                    <input type="number" class="form-control" id="kilometraje" name="kilometraje" min="0" placeholder="Ej: 50000" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción detallada del auto..."></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="disponible" name="disponible" checked>
                <label class="form-check-label" for="disponible">
                    Disponible para la venta
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Auto</button>
            <a href="/" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>