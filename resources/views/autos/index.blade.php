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
                <a href="/categorias" class="btn btn-success me-2">
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
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="autos-table-body">
                    @if ($autos->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No hay autos registrados.</td>
                    </tr>
                    @else
                    @foreach ($autos as $auto)
                    <tr>
                        <td>{{ $auto->id }}</td>
                        <td>{{ $auto->nombre }}</td>
                        <td>{{ $auto->descripcion }}</td>
                        <td>{{ $auto->marca }}</td>
                        <td>{{ $auto->modelo }}</td>
                        <td>{{ $auto->categoria_nombre ?? 'Sin categoría' }}</td>
                        <td>
                            <a href="{{ route('autos.show', $auto->id) }}"
                                class="btn btn-primary btn-sm d-inline-flex align-items-center">
                                <i class="bi bi-pencil-fill me-1"></i> Editar
                            </a>
                            <button type="button" class="btn btn-danger btn-sm d-inline-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#borrarCategoria"
                                data-categoria-id="{{ $auto->id }}" data-categoria-nombre="{{ $auto->nombre }}">
                                <i class="bi bi-trash-fill me-1"></i> Eliminar
                            </button>
                        </td>
        </div>
        </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
        </div>
    </main>
</body>
</html>
