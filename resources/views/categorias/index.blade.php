<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías de Autos</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Incluye Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Asegura el uso de la fuente Inter */
        }

        .btn {
            border-radius: 0.5rem;
            /* Bordes redondeados para botones */
        }

        .table {
            border-radius: 0.5rem;
            /* Bordes redondeados para la tabla */
            overflow: hidden;
            /* Para que los bordes redondeados se apliquen al contenido de la tabla */
        }

        .alert {
            border-radius: 0.5rem;
            /* Bordes redondeados para alertas */
        }

        .header-content {
            position: relative;
            padding-top: 20px;
            /* Espacio para el botón Volver */
        }

        .header-back-button {
            position: absolute;
            top: 1rem;
            left: 1rem;
            z-index: 10;
        }

    </style>
</head>

<body>
    <header class="bg-primary text-white py-4 mb-4">
        <div class="container header-content">
            <div class="header-back-button">
                <a href="/" class="btn btn-secondary d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Volver
                </a>
            </div>

            <div class="text-center">
                <h1 class="display-4 mb-0">
                    Lista de Categorías
                </h1>
                <p class="lead">Aquí podrás ver, crear o editar alguna categoría de vehículos.</p>
            </div>
        </div>
    </header>

    <main class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Listado de Categorías</h2>
            <div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarModal">
                    <i class="bi bi-plus me-1"></i> Crear Categoría
                </button>
            </div>
        </div>
        @include('categorias.create')
        </div>
        </div>

        {{-- Aquí irían las alertas de Laravel que vimos antes, si las estás usando --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th> {{-- Añadido ID para mostrar --}}
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="categorias-table-body">
                    @if ($categorias->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">No hay categorías registradas.</td>
                    </tr>
                    @else
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('categorias.show', $categoria->id) }}"
                                    class="btn btn-primary btn-sm d-inline-flex align-items-center">
                                    <i class="bi bi-pencil-fill me-1"></i> Editar
                                </a>

                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger btn-sm d-inline-flex align-items-center">
                                        <i class="bi bi-pencil-fill me-1"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
