<?php

use models\Juegos;
use models\Categorias;

$Juegos = new Juegos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Juegos</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Registro de Juegos</a>
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
  <!-- Contenedor principal -->
  <div class="container mb-5">
    <!-- Card del formulario -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header text-center">
        <h2 class="h4 mb-0">Registro de Juegos</h2>
      </div>
      <div class="card-body">
        <div class="row g-4">
          <!-- Columna izquierda: Vista previa de la imagen -->
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div id="imagePreview" class="border rounded d-flex justify-content-center align-items-center" style="width: 16rem; height: 16rem; border: 2px dashed #ced4da;">
              <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0iI2NjYyI+PHBhdGggZD0iTTE5IDV2MTRINVY1aDhtLTItMkg1YTIgMiAwIDAgMC0yIDJ2MTRhMiAyIDAgMCAwIDIgMmgxNGEyIDIgMCAwIDAgMi0yVjVhMiAyIDAgMCAwLTItMnpNMTIgMTUuNWw0LTQuNS0yLjU4LTIuNTgtMS40MiAxLjQxTDEzLjUgMTJsLTMuNSAzLjV6Ii8+PC9zdmc+" alt="Vista previa" class="opacity-50" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
          </div>
          <!-- Columna derecha: Formulario -->
          <div class="col-md-6">
            <form id="razaForm" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="juego" class="form-label fw-semibold">Nombre del Juego</label>
                <input type="text" name="juego" id="juego" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="raza" class="form-label fw-semibold">Genero</label>
                <select name="categoria" id="categoria" class="form-select">
                  <?php

                  $categorias = new Categorias();
                  $rs = $categorias->select();
                  $getCategorias = [];
                  while ($fila = $rs->fetch_assoc()) {
                    $getCategorias[] = $fila;
                  }
                  foreach ($getCategorias as $cat) {
                    echo "<option value='{$cat['id']}'>{$cat['categoria']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="juego" class="form-label fw-semibold">Precio</label>
                <input type="number" name="precio" id="precio" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="juego" class="form-label fw-semibold">Existencias</label>
                <input type="number" name="existencias" id="existencias" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="fichero" class="form-label fw-semibold">Fotografía</label>
                <input type="file" name="fichero" id="fichero" accept="image/*" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="juego" class="form-label fw-semibold">Clasificacion</label>
                <select name="clasificacion" id="clasificacion" class="form-select">
                  <option value="E">E</option>
                  <option value="E+10">E+10</option>
                  <option value="T">T</option>
                  <option value="M">M</option>
                  <option value="A">A</option>
                </select>
              </div>
              <button type="button" name="enviar" id="enviar" class="btn btn-primary w-100">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabla de registros -->
    <div class="card shadow-sm">
      <div class="card-header">
        <h2 class="h5 mb-0">Listado de Juegos</h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Nombre del Juego</th>
                <th>Categoria ID</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th>Foto</th>
                <th>Clasificacion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $rs =  $Juegos->select();
              $getJuegos = [];
              while ($fila = $rs->fetch_assoc()) {
                $getJuegos[] = $fila;
              }
              ?>
              <?php foreach ($getJuegos as $juego): ?>
                <tr>
                  <td><?= $juego['idJuego'] ?></td>
                  <td><?= $juego['nomJuego'] ?></td>
                  <td><?= $juego['idcategoia'] ?></td>
                  <td><?= $juego['precio'] ?></td>
                  <td><?= $juego['existencias'] ?></td>
                  <td>
                    <img src="<?= "$juego[imagen]" ?>" alt="Poster" class="img-thumbnail" style="width: 50px; height: auto;">
                  </td>
                  <td><?= $juego['clasificacion'] ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm edit-button me-2"
                      data-id="<?= $juego['idJuego'] ?>"
                      data-juego="<?= htmlspecialchars($juego['nomJuego']) ?>"
                      data-categoria="<?= $juego['idcategoia'] ?>"
                      data-precio="<?= $juego['precio'] ?>"
                      data-existencias="<?= $juego['existencias'] ?>"
                      data-clasificacion="<?= $juego['clasificacion'] ?>"
                      data-foto="<?= $juego['imagen'] ?>">
                      Editar
                    </button>
                    <button type="button" class="btn btn-danger btn-sm delete-button" data-id="<?= $juego['idJuego'] ?>">Eliminar</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para editar -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editRazaForm" method="post" enctype="multipart/form-data" class="modal-content">
        <div class="modal-body">
          <!-- Campo oculto para ID -->
          <input type="hidden" name="idjuego" id="edit-idjuego">
          <div class="mb-3">
            <label for="edit-juego" class="form-label fw-semibold">Nombre del Juego</label>
            <input type="text" name="juego" id="edit-juego" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="edit-categoria" class="form-label">Categoria</label>
            <select name="categoria" id="edit-categoria" class="form-select">
              <?php
              $categorias = new Categorias();
              $rs = $categorias->select();
              $getCategorias = [];
              while ($fila = $rs->fetch_assoc()) {
                $getCategorias[] = $fila;
              }
              foreach ($getCategorias as $cat) {
                echo "<option value='{$cat['id']}'>{$cat['categoria']}</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="edit-precio" class="form-label fw-semibold">Precio</label>
            <input type="number" name="precio" id="edit-precio" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="edit-existencias" class="form-label fw-semibold">Existencias</label>
            <input type="number" name="existencias" id="edit-existencias" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="edit-fichero" class="form-label fw-semibold">Fotografía</label>
            <input type="file" name="fichero" id="edit-fichero" accept="image/*" class="form-control">
            <!-- Vista previa en el modal -->
            <div id="modal-img-container" class="mt-2 text-center">
              <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0iI2NjYyI+PHBhdGggZD0iTTE5IDV2MTRINVY1aDhtLTItMkg1YTIgMiAwIDAgMC0yIDJ2MTRhMiAyIDAgMCAwIDIgMmgxNGEyIDIgMCAwIDAgMi0yVjVhMiAyIDAgMCAwLTItMnpNMTIgMTUuNWw0LTQuNS0yLjU4LTIuNTgtMS40MiAxLjQxTDEzLjUgMTJsLTMuNSAzLjV6Ii8+PC9zdmc+" alt="Vista previa" id="modal-img" class="img-thumbnail" style="max-width: 100%; height: auto;">
            </div>
          </div>
          <div class="mb-3">
            <label for="edit-clasificacion" class="form-label fw-semibold">Clasificacion</label>
            <input type="text" name="clasificacion" id="edit-clasificacion" required class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="update" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle JS (incluye Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Envío del formulario para crear juego
    $(document).on('click', '#enviar', function() {
      var juego = $('#juego').val();
      var categoria = $('#categoria').val();
      var precio = $('#precio').val();
      var existencias = $('#existencias').val();
      var clasificacion = $('#clasificacion').val();
      var file_data = $('#fichero').prop('files')[0];

      var formData = new FormData();
      formData.append('juego', juego);
      formData.append('categoria', categoria);
      formData.append('precio', precio);
      formData.append('existencias', existencias);
      formData.append('clasificacion', clasificacion);
      formData.append('fichero', file_data);

      $.ajax({
        url: 'juegos/insert',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            Swal.fire({
              title: 'Guardado!',
              icon: 'success',
              text: 'El juego ha sido guardado correctamente',
              showConfirmButton: true,
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          } else if (response.status == 500) {
            Swal.fire({
              title: 'ERROR!',
              icon: 'error',
              text: 'Error al subir el archivo',
              showConfirmButton: true,
            });
          }
        },
      });
    });

    // Vista previa de la imagen en el formulario de creación
    document.getElementById('fichero').addEventListener('change', function(e) {
      const reader = new FileReader();
      const preview = document.getElementById('imagePreview');
      const img = preview.querySelector('img');
      preview.style.border = "2px solid #0d6efd";
      reader.onload = function(e) {
        img.src = e.target.result;
        img.classList.remove('opacity-50');
      }
      reader.readAsDataURL(this.files[0]);
    });

    // Lógica para abrir el modal de edición y cargar datos en el formulario de edición
    $(document).on('click', '.edit-button', function() {
      // Se asume que en cada botón de edición se han definido los data-* correspondientes:
      // data-id, data-juego, data-categoria, data-precio, data-existencias, data-clasificacion y data-foto
      var id = $(this).data('id');
      var juego = $(this).data('juego');
      var categoria = $(this).data('categoria');
      var precio = $(this).data('precio');
      var existencias = $(this).data('existencias');
      var clasificacion = $(this).data('clasificacion');
      var foto = $(this).data('foto');

      // Cargar los datos en los campos del modal
      $('#edit-idjuego').val(id);
      $('#edit-juego').val(juego);
      $('#edit-categoria').val(categoria);
      $('#edit-precio').val(precio);
      $('#edit-existencias').val(existencias);
      $('#edit-clasificacion').val(clasificacion);
      if (foto) {
        $('#modal-img').attr('src', foto);
      } else {
        $('#modal-img').attr('src', 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0iI2NjYyI+PHBhdGggZD0iTTE5IDV2MTRINVY1aDhtLTItMkg1YTIgMiAwIDAgMC0yIDJ2MTRhMiAyIDAgMCAwIDIgMmgxNGEyIDIgMCAwIDAgMi0yVjVhMiAyIDAgMCAwLTItMnpNMTIgMTUuNWw0LTQuNS0yLjU4LTIuNTgtMS40MiAxLjQxTDEzLjUgMTJsLTMuNSAzLjV6Ii8+PC9zdmc+');
      }

      // Mostrar el modal de edición
      var editModal = new bootstrap.Modal(document.getElementById('editModal'));
      editModal.show();
    });

    // Vista previa de la imagen en el modal de edición
    document.getElementById('edit-fichero').addEventListener('change', function(e) {
      const reader = new FileReader();
      const img = document.getElementById('modal-img');
      reader.onload = function(e) {
        img.src = e.target.result;
      }
      reader.readAsDataURL(this.files[0]);
    });

    // Lógica para actualizar el juego a través del formulario de edición
    $(document).on('click', '#update', function() {
      var idjuego = $('#edit-idjuego').val();
      var juego = $('#edit-juego').val();
      var categoria = $('#edit-categoria').val();
      var precio = $('#edit-precio').val();
      var existencias = $('#edit-existencias').val();
      var clasificacion = $('#edit-clasificacion').val();
      var file_data = $('#edit-fichero').prop('files')[0];

      var formData = new FormData();
      formData.append('idjuego', idjuego);
      formData.append('juego', juego);
      formData.append('categoria', categoria);
      formData.append('precio', precio);
      formData.append('existencias', existencias);
      formData.append('clasificacion', clasificacion);
      // Solo se envía el archivo si se ha seleccionado uno
      if (file_data !== undefined) {
        formData.append('fichero', file_data);
      }

      $.ajax({
        url: 'juegos/update',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            Swal.fire({
              title: 'Actualizado!',
              icon: 'success',
              text: 'El juego se ha actualizado correctamente',
              showConfirmButton: true,
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          } else if (response.status == 500) {
            Swal.fire({
              title: 'ERROR!',
              icon: 'error',
              text: 'Error al subir el archivo',
              showConfirmButton: true,
            });
          }
        },
      });
    });

    // Lógica para eliminar juego
    $(document).on('click', '#delete', function() {
      var idjuego = $(this).data('id');
      var formData = new FormData();
      formData.append('id', idjuego);

      $.ajax({
        url: 'juegos/delete',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            Swal.fire({
              title: 'Eliminado!',
              icon: 'success',
              text: response.message,
              showConfirmButton: true,
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          } else {
            Swal.fire({
              title: 'ERROR!',
              icon: 'error',
              text: response.message,
              showConfirmButton: true,
            });
          }
        }
      });
    });
  </script>
</body>

</html>