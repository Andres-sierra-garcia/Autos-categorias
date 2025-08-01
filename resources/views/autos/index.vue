<template>
    <div>
        <header class="bg-primary text-white py-4 mb-4">
            <div class="container text-center">
                <h1 class="display-4 mb-0">
                    Registro de Autos <i class="bi bi-car-front-fill"></i>
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
                <a href="/registrarAuto" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                    <i class="bi bi-pencil-fill me-1"></i>Registrar auto
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
                        <tr v-if="autos.length === 0">
                            <td colspan="7" class="text-center">No hay autos registrados.</td>
                        </tr>
                        <tr v-for="auto in autos" :key="auto.id">
                            <td>{{ auto.id }}</td> <td>{{ auto.nombre }}</td>
                            <td>{{ auto.descripcion }}</td>
                            <td>{{ auto.marca }}</td>
                            <td>{{ auto.modelo }}</td>
                            <td>{{ auto.categoria_nombre || 'Sin categoria' }}</td>
                            <td class="text-center" style="display: flex; gap: 5px; justify-content: center;">
                                <router-link :to="`/editarAuto/${auto.id}`" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </router-link>
                                <button @click="deleteAuto(auto.id)" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </button>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div> </template>

<script>
export default {
    name: 'AutosIndex',
    data() {
        return {
            autos: [],
            categorias: []
        };
    },
    mounted() {
        this.fetchAutos();
    },
    methods: {
        fetchAutos() {
            this.$axios
                .get('/api/autos')
                .then(response => {
                    console.log('Autos cargados exitosamente:', response.data);
                    this.autos = response.data;
                })
                .catch(error => {
                    console.error('Error al cargar los autos:', error);
                });
        },
        deleteAuto(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este auto?')) {
                this.$axios
                    .delete(`/api/autos/${id}`)
                    .then(response => {
                        console.log('Auto eliminado exitosamente:', response.data);
                        this.fetchAutos();
                    })
                    .catch(error => {
                        console.error('Error al eliminar el auto:', error);
                    });
            }
        }
    }
};
</script>