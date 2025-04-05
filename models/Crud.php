<?php
namespace models;
use libs\Conexion as Conexion;

abstract class Crud extends Conexion
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public abstract function select();

  public abstract function selectById($id);

  public abstract function insert($data);

  public abstract function update($data);
  
  public abstract function delete($id);

}