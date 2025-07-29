<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Auto</title>
</head>
<body>
   <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarRegistro" action="{{ route('autos.update', $auto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="campo1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="campo1" name="nombre" value="{{ $auto->nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="campo2" class="form-label">Descripción</label>
                        <textarea class="form-control" id="campo2" name="descripcion" required>{{ $auto->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="campo3" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="campo3" name="marca" value="{{ $auto->marca }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="campo4" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="campo4" name="modelo" value="{{ $auto->modelo }}" required>
                    </div>

                    <select class="form-select mb-3" name="categoria_id" id="categoria_id" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $auto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
               <a href="/">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<script>
    let editarModal = new bootstrap.Modal(document.getElementById('editarModal'));
    editarModal.show();
</script>
</body>
</html>