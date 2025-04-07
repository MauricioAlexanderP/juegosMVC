<?php

namespace controllers;

use models\Categorias;

class CategoriasController
{

  public function index()
  {
    require_once 'views/categorias/index.php';
  }

  public function insert()
  {
    header('Content-Type: application/json; charset=UTF-8');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $categoria = $_POST['categoria'];
      try {
        $Categorias = new Categorias();
        $Categorias->insert($categoria);
        return json_encode([
          'status' => 'success',
          'message' => 'Categoria registrada correctamente'
        ]);
        
        exit; 
      } catch (\Throwable $th) {
        return json_encode(array(
          'status' => 'error',
          'message' => 'Error al registrar la categoria: ' . $th->getMessage()
        ));
        exit; 
      }
    }
  }

  public function delete()
  {
    header('Content-Type: application/json; charset=UTF-8');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $idCategoria = $_POST['idcategoria'];
      try {
        $Categorias = new Categorias();
        $Categorias->delete($idCategoria);
        return json_encode([
          'status' => 'success',
          'message' => 'Categoria eliminada correctamente'
        ]);
        
        exit; 
      } catch (\Throwable $th) {
        return json_encode(array(
          'status' => 'error',
          'message' => 'Error al eliminar la categoria: ' . $th->getMessage()
        ));
        exit; 
      }
    }
  }
}
