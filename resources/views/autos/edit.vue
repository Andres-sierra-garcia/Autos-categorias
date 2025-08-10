<template>
    <form id="formEditarRegistro" @submit.prevent="editarAuto" action="/" method="POST">
        <div class="mb-3">
            <label for="campo1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="campo1" v-model="auto.nombre" name="nombre"  required>
        </div>

        <div class="mb-3">
            <label for="campo2" class="form-label">Descripción</label>
            <textarea class="form-control" v-model="auto.descripcion" id="campo2" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="campo3" class="form-label">Marca</label>
            <input type="text" class="form-control" id="campo3" name="marca" v-model="auto.marca" required>
        </div>

        <div class="mb-3">
            <label for="campo4" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="campo4" name="modelo" v-model="auto.modelo" required>
        </div>

        <select v-model="auto.categoria_id" class="form-select mb-3" name="categoria_id" id="categoria_id" required>
            <option value="">Selecciona una categoría</option>
            <option v-for="categoria in categorias" :value="categoria.id" :key="categoria.id">
                {{ categoria.nombre }}
            </option>
        </select>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <router-link to="/" class="btn btn-secondary">Cancelar</router-link>
    </form>
</template>
<script>
    export default {
        name: 'EditarAuto',
        data() {
            return {
                auto: {
                    nombre: '',
                    descripcion: '',
                    marca: '',
                    modelo: '',
                    categoria_id: ''
                },
                categorias: []
            };
        },
        mounted() {
            this.fetchAuto();
            this.fetchCategorias();
        }
        ,
        methods: {
            fetchCategorias() {
            this.$axios
                .get('/api/categorias')
                .then(response => {
                    this.categorias = response.data;
                    console.log('Categorías cargadas exitosamente:', this.categorias);
                })
                .catch(error => {
                    console.error('Error al cargar las categorías:', error);
                });
        },
            fetchAuto() {
                const autoId = this.$route.params.id;
                console.log('Cargando auto con ID:', autoId);
                this.$axios
                    .get(`/api/autos/${autoId}`)
                    .then(response => {
                        this.auto = response.data;
                        console.log('Auto cargado exitosamente:', response);
                    })
                    .catch(error => {
                        console.error('Error al cargar el auto:', error);
                    });
            },
        
            editarAuto() {
                this.$axios
                    .put(`/api/autos/${this.auto.id}`, this.auto)
                    .then(response => {
                        this.$router.push('/');
                        console.log('Auto editado exitosamente:', response.data);
                    })
                    .catch(error => {
                        console.error('Error al editar el auto:', error);
                    });
            }
        },
        
    };

</script>
