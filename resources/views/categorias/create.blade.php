<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Registrar Nuevo categoria</h1>

        <form action="/autos" method="POST">
            <input type="hidden" name="_token" value="TU_TOKEN_CSRF_AQUI">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Ej: Toyota" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla" required>
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="#" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>