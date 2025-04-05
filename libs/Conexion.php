<?php
namespace libs;
class Conexion
{
  private $con = null;

  public function __construct()
  {
    $this->con = new \mysqli('localhost', 'root', '', 'tienda31');
  }

  public function consulta($sql)
  {
    return $this->con->query($sql);
  }

  public function secureSQL($strVar)
  {
    $banned = array("select", "drop", "|", "'", ";", "--", "insert", "delete", "xp_");
    $vowels = $banned;
    $no = str_replace($vowels, "", $strVar);
    $final = str_replace("'", "", $no);
    return $no;
  }
}
