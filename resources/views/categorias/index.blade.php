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
    <div class="d-flex justify-content-center align-items-center gap-2"> {{-- Contenedor flexible para alinear y espaciar --}}
        {{-- Botón de Editar --}}
        {{-- He usado 'categorias.edit' que es la convención para mostrar el formulario de edición.
             Si tu método 'show' retorna el formulario de edición, puedes mantener 'categorias.show'. --}}
        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
            <i class="bi bi-pencil-fill me-1"></i> Editar
        </a>

        {{-- Botón de Eliminar --}}
        <button type="button" class="btn btn-danger btn-sm d-inline-flex align-items-center"
            data-bs-toggle="modal" data-bs-target="#borrarCategoria"
            data-categoria-id="{{ $categoria->id }}" data-categoria-nombre="{{ $categoria->nombre }}">
            <i class="bi bi-trash-fill me-1"></i> Eliminar
        </button>
    </div>
</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

            <div class="modal fade" id="borrarCategoria" tabindex="-1" aria-labelledby="borrarCategoriaLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"> {{-- Añadido para centrar verticalmente --}}
                    <div class="modal-content border-danger border-3"> {{-- Borde rojo para advertencia --}}
                        <div class="modal-header bg-danger text-white"> {{-- Fondo rojo en el encabezado --}}
                            <h5 class="modal-title" id="borralCategoriaLabel">
                                <i class="bi bi-exclamation-triangle-fill"></i> Advertencia
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button> {{-- btn-close-white para ícono blanco --}}
                        </div>
                        <div class="modal-body text-center"> {{-- Centrar texto del cuerpo --}}
                            <p class="lead mb-4">
                                <i class="bi bi-x-circle-fill text-danger display-4"></i>
                                {{-- Ícono grande de advertencia/error --}}
                            </p>
                            <p class="fs-5 fw-bold">¿Estás seguro de que quieres eliminar esta categoría?</p>
                            <p class="text-muted">Esta acción no se puede deshacer.</p>
                        </div>
                        <div class="modal-footer justify-content-between"> {{-- Botones justificados al espacio --}}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i> Cancelar
                            </button>
                            <button id="confirmarEliminarBtn" type="button" class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        const btnFormCreate = document.querySelector('[data-bs-target]');
        if (btnFormCreate) {
            btnFormCreate.addEventListener('click', function () {
                const target = this.getAttribute('data-bs-target');
                const modal = document.querySelector(target);
                if (modal) {
                    const modalInstance = new bootstrap.Modal(modal);
                    modalInstance.show();
                }
            });
        }
        

        document.addEventListener('DOMContentLoaded', function () {
            const modalBorrarCategoria = document.getElementById('borrarCategoria');
            const modalCategoriaNombre = modalBorrarCategoria ? modalBorrarCategoria.querySelector(
                '.modal-body .fw-bold') : null;

            const confirmarEliminarBtn = document.getElementById('confirmarEliminarBtn');

            let categoriaIdAEliminar = null;

            if (modalBorrarCategoria) {
                modalBorrarCategoria.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    categoriaIdAEliminar = button.getAttribute('data-categoria-id');
                    const categoriaNombre = button.getAttribute('data-categoria-nombre');

                    if (modalCategoriaNombre) {
                        modalCategoriaNombre.textContent =
                            `¿Estás seguro de que quieres eliminar la categoría "${categoriaNombre}"?`;
                    }
                    console.log('Modal de eliminación abierto para ID:', categoriaIdAEliminar,
                        'Nombre:', categoriaNombre);
                });
            }

            if (confirmarEliminarBtn) {
                confirmarEliminarBtn.addEventListener('click', function () {
                    if (categoriaIdAEliminar) {
                        console.log('Iniciando eliminación para categoría ID:', categoriaIdAEliminar);

                        fetch(`/categorias/${categoriaIdAEliminar}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]') ? document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content') : '',
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(err => Promise.reject(err));
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log('Respuesta del servidor:', data);
                                if (data.success) {
                                    alert('Categoría eliminada exitosamente.');
                                    window.location.reload();
                                } else {
                                    alert('Error al eliminar: ' + (data.message ||
                                        'Mensaje desconocido.'));
                                }
                            })
                            .catch(error => {
                                console.error('Error en la petición de eliminación:', error);
                                alert(
                                    'Ocurrió un error inesperado al intentar eliminar la categoría.');
                            })
                            .finally(() => {
                                let modalInstance = bootstrap.Modal.getInstance(
                                    modalBorrarCategoria);
                                if (modalInstance) {
                                    modalInstance.hide();
                                }
                            });

                    } else {
                        console.warn('No se pudo determinar la ID de la categoría a eliminar.');
                        alert('Error: No se seleccionó una categoría para eliminar.');
                        let modalInstance = bootstrap.Modal.getInstance(modalBorrarCategoria);
                        if (modalInstance) {
                            modalInstance.hide();
                        }
                    }
                });
            }
        });

    </script>
</body>

</html>
