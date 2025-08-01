<template>
  <div class="modal-content">
    <div class="modal-header bg-primary text-white">
      <h5 class="modal-title" id="crearCategoriaModalLabel">
        <i class="bi bi-folder-plus me-2"></i> Crear Nueva Categoría
      </h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar" @click="cerrarModalExterno"></button>
    </div>
    <div class="modal-body">
      <div v-if="mensaje" :class="['alert', alertClass, 'alert-dismissible', 'fade', 'show']" role="alert">
        {{ mensaje }}
        <button type="button" class="btn-close" @click="mensaje = ''" aria-label="Cerrar"></button>
      </div>

      <form id="formCrearCategoria" @submit.prevent="registrarCategoria">
        <div class="mb-3">
          <label for="nombreCategoria" class="form-label fw-bold">Nombre</label>
          <input
            type="text"
            v-model="categoria.nombre"
            class="form-control"
            id="nombreCategoria"
            name="nombre"
            placeholder="Introduce el nombre de la categoría"
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
            placeholder="Digita una descripción de la categoría"
            rows="4"
            required
          ></textarea>
        </div>
      </form>
    </div>
    <div class="modal-footer justify-content-center">
      <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal" @click="cerrarModalExterno">
        <i class="bi bi-x-circle me-1"></i> Cancelar
      </button>
      <button type="submit" class="btn btn-primary" form="formCrearCategoria">
        <i class="bi bi-save me-1"></i> Guardar Categoría
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoriasCreate",
  data() {
    return {
      categoria: {
        nombre: '',
        descripcion: ''
      },
      mensaje: "", // Para mensajes de notificación
      alertClass: "", // Clase de Bootstrap para el tipo de alerta (éxito/error)
    };
  },
  methods: {
    resetForm() {
      this.categoria = {
        nombre: '',
        descripcion: ''
      };
      this.mensaje = '';
      this.alertClass = '';
    },
    cerrarModalExterno() {
      // Si el modal es parte de la ruta y no un modal de Bootstrap manejado por JS externo,
      // entonces esta función puede redirigir.
      if (this.$router) { // Check if router exists
        this.$router.push('/categorias'); // Redirige a la lista de categorías
      } else {
        // Si es un modal de Bootstrap abierto desde otro componente,
        // podrías necesitar emitir un evento para que el padre lo cierre.
        this.$emit('close-modal');
      }
    },
    registrarCategoria() {
      this.$axios.post('/api/categorias', this.categoria)
        .then(response => {
          console.log('Categoría creada exitosamente:', response.data);
          this.mostrarAlerta("¡Categoría creada exitosamente!", "alert-success");
          this.resetForm(); // Limpia el formulario
          
          // Opcional: Cerrar el modal o redirigir después de un tiempo
          setTimeout(() => {
            if (this.$router) {
                this.$router.push('/categorias'); // Redirige a la lista
            } else {
                this.$emit('close-modal'); // Emite evento para cerrar el modal
            }
          }, 1500); // 1.5 segundos para ver el mensaje
        })
        .catch(error => {
          console.error('Error al crear la categoría:', error);
          const errorMessage = error.response && error.response.data && error.response.data.message
                               ? error.response.data.message
                               : "Error al crear la categoría. Intente de nuevo.";
          this.mostrarAlerta(errorMessage, "alert-danger");
        });
    },
    mostrarAlerta(mensaje, tipo) {
      this.mensaje = mensaje;
      this.alertClass = tipo;
      // Opcional: Ocultar la alerta automáticamente después de un tiempo
      if (tipo === "alert-success") {
        setTimeout(() => {
          this.mensaje = "";
        }, 3000); // Ocultar después de 3 segundos
      }
    }
  }
};
</script>

<style scoped>
/* Puedes añadir estilos CSS específicos para este componente aquí */
</style>