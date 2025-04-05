<?php
require_once 'config.php';

namespace libs;
class Conexion
{
  private $con = null;

  public function __construct()
  {
    $this->con = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
