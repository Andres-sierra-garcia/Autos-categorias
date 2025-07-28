<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar categoria</title>
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
                <form id="formEditarRegistro" action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="campo1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="campo1" name="nombre" value="{{ $categoria->nombre }}">
                    </div>

                    <div class="mb-3">
                        <label for="campo2" class="form-label">Descripción</label>
                        <textarea class="form-control" id="campo2" name="descripcion">{{ $categoria->descripcion }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
               <a href="/categorias">Cerrar</a>
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