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
    // TODO
  }

  public function insert($data)
  {
    // TODO
  }

  public function update($data)
  {
    // TODO
  }

  public function delete($id)
  {
    // TODO
  }
}
