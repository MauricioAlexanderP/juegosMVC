<?php

namespace controllers;

use models\Juegos;

class JuegosController
{

  public function index()
  {
    require_once 'views/juegos/index.php';
  }

  public function insert()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_FILES["fichero"])) {
        if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
          // Validación de tipo de imagen
          $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
          $finfo = finfo_open(FILEINFO_MIME_TYPE);
          $mimeType = finfo_file($finfo, $_FILES['fichero']['tmp_name']);
          finfo_close($finfo);
    
          if (!in_array($mimeType, $allowedTypes)) {
            echo "
              <script>
                  Swal.fire({
                      title: 'Tipo de archivo inválido!',
                      icon: 'error',
                      text: 'Solo se permiten imágenes (JPG, PNG, WEBP, GIF)',
                      showConfirmButton: true,
                  });
              </script>
              ";
            exit;
          }
    
          $tmp_name = $_FILES["fichero"]["tmp_name"];
          $name = "img/" . $_FILES["fichero"]["name"];
          $nombrearchivoSinExtension = substr($name, 0, strpos($name, '.'));
          $extensionArchivo = substr(strrchr($name, '.'), 1);
    
          if (!is_dir('img')) {
            mkdir('img', 0777, true);
          }
    
          if (is_file($name)) {
            $idUnico = time();
            $name = "img/" . $idUnico . "-" . $_FILES["fichero"]["name"];
          }
          if (move_uploaded_file($tmp_name, $name)) {
            echo json_encode([
              'status' => 200,
              'message' => 'Guardado!',
            ]);
          } else {
            echo json_encode([
              'status' => 500,
              'message' => 'error',
            ]);
          }
        } else {
          echo json_encode([
            'status' => 500,
            'message' => 'error',
          ]);
        }
      }
      $datos[] = $_POST["juego"];
      $datos[] = $_POST["categoria"];
      $datos[] = $_POST["precio"];
      $datos[] = $name;
      $datos[] = $_POST["clasificacion"];
      $datos[] = $_POST["existencias"];
      
      $juegos = new Juegos();
      $juegos->insert($datos);
    }
    
  }

  public function delete()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      try {
        $juegos = new Juegos();
        $juegos->delete($id);
        return json_encode([
          'status' => 200,
          'message' => 'Eliminado correctamente!',
        ]);
      } catch (\Throwable $th) {
        return json_encode([
          'status' => 500,
          'message' => 'error'. $th->getMessage(),
        ]);
      }
    }
  }
}
