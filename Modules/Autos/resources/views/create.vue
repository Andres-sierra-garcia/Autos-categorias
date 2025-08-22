<template>
    <div class="container mt-5">
        <!-- Agrega un contenedor para centrar y dar margen -->
        <h5 class="mb-4">Registrar auto</h5>
        <form
            id="formEditarRegistro"
            @submit.prevent="registrarAuto"
            action="/"
            method="POST"
        >

            <div class="mb-3">
                <label for="campo1" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    id="campo1"
                    v-model="auto.nombre"
                    name="nombre"
                    placeholder="Nombre de el auto"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="campo2" class="form-label">Descripción</label>
                <textarea
                    class="form-control"
                    id="campo2"
                    v-model="auto.descripcion"
                    rows="3"
                    name="descripcion"
                    placeholder="Digita una descripcion"
                    required
                ></textarea>
            </div>

            <div class="mb-3">
                <label for="campo3" class="form-label">Marca</label>
                <input
                    type="text"
                    class="form-control"
                    id="campo3"
                    v-model="auto.marca"
                    name="marca"
                    placeholder="Marca del auto"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="campo4" class="form-label">Modelo</label>
                <input
                    type="text"
                    class="form-control"
                    id="campo4"
                    v-model="auto.modelo"
                    name="modelo"
                    placeholder="Modelo del auto"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="campo5" class="form-label">Categoría</label>
                <select
                    class="form-select"
                    v-model="auto.categoria_id"
                    id="campo5"
                    name="categoria_id"
                    required
                >
                    <option value="" disabled selected>
                        Selecciona una categoría
                    </option>
                            <option v-for="categoria in categorias"  :key="categoria.id" :value="categoria.id">
                        {{ categoria.nombre }}
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar Cambios
            </button>
        </form>
        <div class="mt-3">
            <a href="/" class="btn btn-secondary">Cerrar</a>
        </div>
    </div>
</template>
<script>
import { onMounted } from 'vue';

export default {
    name: "CreateAuto",
    data() {
        return {
            auto: {
                nombre: "",
                descripcion: "",
                marca: "",
                modelo: "",
                categoria_id: "",
            },
            categorias: [],
        };
    },
    mounted() {
        this.fetchCategorias();
    },
    methods: {
        registrarAuto() {
            console.log("Registrando auto:", this.auto);
            this.$axios
                .post("api/autos", this.auto)
                .then((response) => {
                    console.log("Auto registrado exitosamente:", response.data);
                    this.$router.push('/');
                })
                .catch((error) => {
                    console.error('Detalles del error:', {
                     message: error.message,
                     name: error.name,
                     stack: error.stack,
                     originalError: error
                 });
                });
        },

        fetchCategorias() {
            this.$axios
                .get('api/categorias')
                .then(response => {
                    console.log('Categorías cargadas exitosamente:', response.data);
                    this.categorias = response.data;
                })
                .catch(error => {
                    console.error('Error al cargar las categorías:', error);
                });
        }
    },
};
</script>
