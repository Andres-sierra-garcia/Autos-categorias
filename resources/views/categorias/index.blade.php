<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías de Autos</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Incluye Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif; /* Asegura el uso de la fuente Inter */
        }
        .btn {
            border-radius: 0.5rem; /* Bordes redondeados para botones */
        }
        .table {
            border-radius: 0.5rem; /* Bordes redondeados para la tabla */
            overflow: hidden; /* Para que los bordes redondeados se apliquen al contenido de la tabla */
        }
        .alert {
            border-radius: 0.5rem; /* Bordes redondeados para alertas */
        }
        .header-content {
            position: relative;
            padding-top: 20px; /* Espacio para el botón Volver */
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
                <a href="/categorias/create" class="btn btn-success me-2 d-flex align-items-center">
                    <i class="bi bi-plus me-1"></i> Crear categoría
                </a>
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
                    {{-- El contenido se llenará con JavaScript --}}
                    <tr>
                        <td colspan="4" class="text-center">Cargando categorías...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Incluye Bootstrap JS (Bundle con Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function cargarCategorias() {
            const tableBody = document.getElementById('categorias-table-body');
            // Muestra el mensaje de carga mientras se obtienen los datos
            if (tableBody) {
                tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Cargando categorías...</td></tr>';
            }

            fetch('http://127.0.0.1:8000/api/categorias') // La URL de tu API
                .then(response => {
                    if (!response.ok) {
                        const errorResponseClone = response.clone();
                        return errorResponseClone.json()
                            .then(errorData => {
                                throw new Error(`HTTP Error: ${response.status} ${response.statusText}. Detalles del servidor: ${JSON.stringify(errorData)}`);
                            })
                            .catch(() => {
                                throw new Error(`HTTP Error: ${response.status} ${response.statusText}. El servidor no devolvió un JSON de error.`);
                            });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("✅ Datos de categorías cargados exitosamente:", data);

                    // Limpiar el cuerpo de la tabla antes de añadir nuevos datos
                    if (tableBody) {
                        tableBody.innerHTML = '';

                        // Si no hay datos, mostrar un mensaje
                        if (data.length === 0) {
                            tableBody.innerHTML = '<tr><td colspan="4" class="text-center">No hay categorías registradas.</td></tr>';
                            return;
                        }

                        // Iterar sobre los datos y crear filas de tabla
                        data.forEach(categoria => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${categoria.id}</td>
                                <td>${categoria.nombre}</td>
                                <td>${categoria.descripcion || 'N/A'}</td> {{-- Muestra 'N/A' si la descripción es nula --}}
                                <td class="text-center">
                                    <a href="/categorias/${categoria.id}/edit" class="btn btn-warning btn-sm me-2 d-inline-flex align-items-center" title="Editar Categoría">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    {{-- El formulario de eliminación se manejará con JavaScript para evitar recargas --}}
                                    <form class="d-inline delete-form" data-id="${categoria.id}">
                                        @csrf {{-- Directiva de Blade para el token CSRF --}}
                                        @method('DELETE') {{-- Directiva de Blade para simular el método DELETE --}}
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center" title="Eliminar Categoría">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // Añadir event listeners a los formularios de eliminación después de que se han añadido al DOM
                        document.querySelectorAll('.delete-form').forEach(form => {
                            form.addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevenir el envío normal del formulario

                                if (confirm('¿Estás seguro de que quieres eliminar esta categoría?')) {
                                    const categoriaId = this.dataset.id;
                                    const csrfToken = this.querySelector('input[name="_token"]').value;

                                    fetch(`/api/categorias/${categoriaId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': csrfToken, // Envía el token CSRF
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            // Si la API devuelve un error (ej. 404, 500)
                                            return response.json().then(errorData => {
                                                throw new Error(`Error al eliminar: ${errorData.message || response.statusText}`);
                                            }).catch(() => {
                                                throw new Error(`Error al eliminar: ${response.statusText}`);
                                            });
                                        }
                                        // Si la eliminación fue exitosa (ej. 204 No Content)
                                        return response.text().then(text => text ? JSON.parse(text) : {});
                                    })
                                    .then(() => {
                                        console.log(`Categoría con ID ${categoriaId} eliminada.`);
                                        // Recargar la lista de categorías para reflejar el cambio
                                        cargarCategorias();
                                    })
                                    .catch(error => {
                                        console.error('Error al eliminar la categoría:', error);
                                        alert(`No se pudo eliminar la categoría: ${error.message}`); // Usar un modal de Bootstrap en un entorno real
                                    });
                                }
                            });
                        });
                    }
                })
                .catch(error => {
                    console.error('❌ ERROR CRÍTICO al cargar las categorías:');
                    console.error('   Mensaje:', error.message);
                    console.error('   Tipo de error:', error.name);
                    console.error('   Objeto de error completo:', error);

                    if (tableBody) {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="text-center text-danger">
                                    ¡Oops! No se pudieron cargar las categorías.
                                    <br>
                                    Por favor, revise la consola del navegador (F12) para más detalles técnicos.
                                    <br>
                                    ${error.message ? `(${error.message})` : ''}
                                </td>
                            </tr>
                        `;
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', cargarCategorias);
    </script>
</body>
</html>