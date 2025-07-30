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

        <select class="form-select mb-3" name="categoria_id" id="categoria_id" required>
            <option value="">Selecciona una categoría</option>
            <option v-for="categoria in categorias" :value="categoria.id" :key="categoria.id">
                {{ categoria.nombre }}
            </option>
        </select>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
        methods: {
            editarAuto() {
                this.$axios
                    .put(`/autos/${this.auto.id}`, this.auto)
                    .then(response => {
                        this.$router.push('/autos');
                    })
                    .catch(error => {
                        console.error('Error al editar el auto:', error);
                    });
            }
        },
        mounted() {
            // Aquí puedes realizar acciones adicionales al montar el componente si es necesario
        }
    };

</script>
