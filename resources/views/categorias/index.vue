<template>
<div >
        <header class="bg-primary text-white py-4 mb-4">
        <div class="container header-content">
            <div class="header-back-button">
                <a href="/" class="btn btn-secondary d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Volver
                </a>
            </div>

            <div class="text-center">
                <h1 class="display-4 mb-0">Lista de Categorías</h1>
                <p class="lead">
                    Aquí podrás ver, crear o editar alguna categoría de
                    vehículos.
                </p>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Listado de Categorías</h2>
            <div>
                <router-link to="/categorias/crear" class="btn btn-success me-2">
                    <i class="bi bi-plus me-1"></i> Crear Categoría
                </router-link>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="categorias-table-body">
                    <tr v-if="!categorias">
                        No hay categorias
                    </tr>
                    <tr v-for="categoria in categorias" :key="categoria.id">
                        <td>{{ categoria.nombre }}</td>
                        <td>{{ categoria.descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <router-link :to="`/categorias/editar/${categoria.id}`"
                                    class="btn btn-warning btn-sm d-inline-flex align-items-center">
                                    <i class="bi bi-pencil-fill me-1"></i>
                                    Editar
                                </router-link>
                                <form @submit.prevent="
                                    deleteCategoria(categoria.id)
                                    " style="display: inline">
                                    <button type="submit"
                                        class="btn btn-danger btn-sm d-inline-flex align-items-center">
                                        <i class="bi bi-trash-fill me-1"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</template>
<script>
export default {
    name: "CategoriasIndex",
    data() {
        return {
            categorias: [],
        };
    },
    mounted() {
        this.fetchCategorias();
    },
    methods: {
        fetchCategorias() {
            this.$axios
                .get("/api/categorias")
                .then((response) => {
                    this.categorias = response.data;
                    console.log(
                        "Categorías cargadas exitosamente:",
                        this.categorias
                    );
                })
                .catch((error) => {
                    console.error("Error al cargar las categorías:", error);
                });
        },
        deleteCategoria(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta categoría?")) {
                this.$axios
                    .delete(`/api/categorias/${id}`)
                    .then((response) => {
                        console.log("Categoría eliminada exitosamente:", response.data);
                        this.fetchCategorias();
                    })
                    .catch((error) => {
                        console.error("Error al eliminar la categoría:", error);
                    });
            }
        },
    },
};
</script>
