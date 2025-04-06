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
<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use controllers\JuegosController;
use controllers\CategoriasController;
use libs\App;

$app = new App();
$app->cargarPaginas();
?>
</html>