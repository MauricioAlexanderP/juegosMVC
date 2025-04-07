<?php

use models\Categorias;

$Categorias = new Categorias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Categorias</title>
  <!-- Bootstrap CSS  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Registro de </a>
      <a class="nav-link active" aria-current="page" href="categorias">Categorias</a>
      <a class="nav-link" href="juegos">Juegos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        </div>
      </div>
    </div>
  </nav>

  <!-- Formulario de registro  -->
  <div class="container mb-5">
    <div class="card shadow-sm mb-4">
      <div class="card-header text-center">
        <h2 class="h4 mb-0">Registro de Categorias</h2>
      </div>
      <div class="card-body">
        <div class="row g-4 align-items-center">
          <!-- Columna izquierda: Vista previa de la imagen  -->

          <!-- Columna derecha: Formulario  -->
          <div class="col-md-6">
            <form id="razaForm" method="post">
              <div class="mb-3">
                <label for="categoria" class="form-label">Nombre de la Categoria</label>
                <input type="text" name="categoria" id="categoria" required class="form-control">
              </div>
              <button type="button" name="enviar" id="enviar" class="btn btn-primary w-100">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabla de registros  -->
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-header">
        <h2 class="h5 mb-0">Listado de Mascotas</h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $rs = $Categorias->select();
              $getCategorias = [];
              while ($fila = $rs->fetch_assoc()) {
                $getCategorias[] = $fila;
              }
              ?>
              <?php foreach ($getCategorias as $categoria): ?>
                <tr>
                  <td><?= $categoria['id'] ?></td>
                  <td><?= $categoria['categoria'] ?></td>
                  <td>
                    <button
                      class="btn btn-primary btn-sm me-2 edit-button"
                      data-idcategoria="<?= $categoria['id'] ?>"
                      data-categoria="<?= htmlspecialchars($categoria['categoria'], ENT_QUOTES) ?>">


                      Editar
                    </button>
                    <button
                      class="btn btn-danger btn-sm delete-button"
                      data-idcategoria="<?= $categoria['id'] ?>">
                      Eliminar
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para editar mascota  -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editMascotaForm" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <!-- Campo oculto para el ID de la mascota  -->
          <input type="hidden" name="idcategoria" id="edit-idcategoria">
          <div class="mb-3">
            <label for="edit-categoria" class="form-label">Categoria</label>
            <input type="text" name="propietario" id="edit-categoria" required class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="update" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle JS (incluye Popper)  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    //Envío del formulario de registro de mascota
    $(document).on('click', '#enviar', function() {
      var categoria = $('#categoria').val();
      $.ajax({
        url: 'categorias/insert',
        type: 'POST',
        dataType: 'json',
        data: {
          categoria: categoria
        },
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Éxito',
              text: response.message,
            }).then(() => {
              window.location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message,
            });
          }
        },
      });
    });

    // Eliminar mascota
    $(document).on('click', '.delete-button', function() {
      var idCategoria = $(this).data('idcategoria');
      console.log(idCategoria);
      $.ajax({
        url: 'categorias/delete',
        type: 'POST',
        dataType: 'json',
        data: {
          idcategoria: idCategoria
        },
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Éxito',
              text: response.message,
            }).then(() => {
              window.location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message,
            });
          }
        },
      });
    });

    // Abrir modal y cargar datos para editar
    $(document).on('click', '.edit-button', function() {
      var idcategoria = $(this).data('idcategoria');
      var categoria = $(this).data('categoria');

      $('#edit-idcategoria').val(idcategoria);
      $('#edit-categoria').val(categoria);

      var editModal = new bootstrap.Modal(document.getElementById('editModal'));
      editModal.show();
    });

    //Editar categoria
    $(document).on('click', '#update', function() {
      var idcategoria = $('#edit-idcategoria').val();
      var categoria = $('#edit-categoria').val();

      $.ajax({
        url: 'controllers/update_categoria.php',
        type: 'POST',
        dataType: 'json',
        data: {
          idcategoria: idcategoria,
          categoria: categoria
        },
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Éxito',
              text: response.message,
            }).then(() => {
              window.location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message,
            });
          }
        },
      });
    });
  </script>
</body>
</html>