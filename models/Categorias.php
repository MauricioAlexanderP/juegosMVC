<?php

namespace models;

use models\Crud as Crud;

class Categorias extends Crud
{
  public function __construct()
  {
    parent::__construct();
  }

  public function select()
  {
    $sql = "SELECT * FROM categorias";
    return $this->consulta($sql);
  }

  public function selectById($id)
  {
    $sql = "SELECT * FROM categorias WHERE id = $id";
    return $this->consulta($sql);
  }

  public function insert($data)
  {
    $data = $this->secureSQL($data);
    $sql = "INSERT INTO categorias(categoria) VALUES ('$data')";
    return $this->consulta($sql);
  }

  public function update($data)
  {
    $id = $this->secureSQL($data[0]);
    $nombre = $this->secureSQL($data[1]);
    $sql = "UPDATE categorias SET categoria = '$nombre' WHERE id = $id";
    return $this->consulta($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM categorias WHERE id = $id";
    return $this->consulta($sql);
  }
}
