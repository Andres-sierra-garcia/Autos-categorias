<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <h2 class="mb-4 text-center">
          <i class="bi bi-pencil-square me-2"></i> Editar Categoría
        </h2>

        <div v-if="mensaje" :class="['alert', alertClass, 'alert-dismissible', 'fade', 'show']" role="alert">
          {{ mensaje }}
          <button type="button" class="btn-close" @click="mensaje = ''" aria-label="Close"></button>
        </div>

        <div class="card shadow-sm p-4">
          <form @submit.prevent="editarCategoria">
            <div class="mb-3">
              <label for="nombreCategoria" class="form-label fw-bold">Nombre</label>
              <input
                type="text"
                v-model="categoria.nombre"
                class="form-control"
                id="nombreCategoria"
                name="nombre"
                required
              />
            </div>

            <div class="mb-3">
              <label for="descripcionCategoria" class="form-label fw-bold">Descripción</label>
              <textarea
                class="form-control"
                id="descripcionCategoria"
                v-model="categoria.descripcion"
                name="descripcion"
                rows="4"
                required
              ></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
              <button type="submit" class="btn btn-primary me-md-2">
                <i class="bi bi-save me-1"></i> Guardar Cambios
              </button>
              <router-link to="/categorias" class="btn btn-secondary">
                <i class="bi bi-x-circle me-1"></i> Cancelar
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoriasEdit",
  data() {
    return {
      categoria: {
        nombre: "",
        descripcion: "",
      },
      mensaje: "", // Para mensajes de notificación
      alertClass: "", // Clase de Bootstrap para el tipo de alerta (éxito/error)
    };
  },
  mounted() {
    this.fetchCategoria();
  },
  methods: {
    fetchCategoria() {
      const idCategoria = this.$route.params.id;
      if (!idCategoria) {
        this.mostrarAlerta("No se encontró el ID de la categoría para editar.", "alert-danger");
        this.$router.push('/categorias');
        return;
      }

      this.$axios
        .get(`/api/categorias/${idCategoria}`)
        .then((response) => {
          this.categoria = response.data;
          console.log("Categoría cargada exitosamente:", this.categoria);
        })
        .catch((error) => {
          console.error("Error al cargar la categoría:", error);
          this.mostrarAlerta("Error al cargar la categoría. Intente de nuevo.", "alert-danger");
        });
    },
    editarCategoria() {
      if (!this.categoria.id) {
          this.mostrarAlerta("No se puede actualizar una categoría sin un ID válido.", "alert-warning");
          return;
      }

      this.$axios
        .put(`/api/categorias/${this.categoria.id}`, this.categoria)
        .then((response) => {
          console.log("Categoría actualizada exitosamente:", response.data);
          this.mostrarAlerta("¡Categoría actualizada exitosamente!", "alert-success");
          setTimeout(() => {
            this.$router.push('/categorias');
          }, 1500);
        })
        .catch((error) => {
          console.error("Error al actualizar la categoría:", error);
          const errorMessage = error.response && error.response.data && error.response.data.message
                               ? error.response.data.message
                               : "Error al actualizar la categoría. Intente de nuevo.";
          this.mostrarAlerta(errorMessage, "alert-danger");
        });
    },
    mostrarAlerta(mensaje, tipo) {
      this.mensaje = mensaje;
      this.alertClass = tipo;
      if (tipo === "alert-success") {
        setTimeout(() => {
          this.mensaje = "";
        }, 3000);
      }
    }
  },
};
</script>

<style scoped>
/* Puedes añadir estilos CSS específicos para este componente aquí si Bootstrap no es suficiente */
</style>