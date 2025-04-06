
<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use controllers\JuegosController;
use controllers\CategoriasController;
use libs\App;

$app = new App();
$app->cargarPaginas();
?>