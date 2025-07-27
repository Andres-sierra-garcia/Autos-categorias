<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Clasificación de Autos</title>
</head>

<body>
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container text-center">
            <h1 class="display-4 mb-0">
                Categorizar Autos <i class="bi bi-car-front-fill"></i>
            </h1>
            <p class="lead">Gestiona fácilmente tu inventario de vehículos.</p>
        </div>
    </header>

    <main class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Listado de Vehículos</h2>
    <div>
        <a href="/verCategorias" class="btn btn-success me-2">
            <i class="bi bi-plus me-1"></i> Ver categorias
        </a>
        <a href="/crearAuto" class="btn btn-primary">
            <i class="bi bi-car-front-fill me-1"></i> Categorizar Auto
        </a>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Toyota Corolla</td>
                        <td>Un sedán confiable y económico.</td>
                        <td>Toyota</td>
                        <td>Corolla</td>
                        <td>Sedán</td>
                        <td class="text-center">
                            <a href="/editarAuto" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-fill"></i></a>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>

</script>

</html>
