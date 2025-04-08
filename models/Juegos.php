<?php

namespace models;

use models\Crud as Crud;

class Juegos extends Crud
{
  public function select()
  {
    $sql = "SELECT * FROM juego";
    return $this->consulta($sql);
  }

  public function selectById($id)
  {
    $sql = "SELECT * FROM juego WHERE id = $id";
    return $this->consulta($sql);
  }

  public function insert($data)
  {
    $nomJuego = $data[0];
    $categoria = $data[1];
    $precio = $data[2];
    $imagen = $data[3];
    $clasificacion = $data[4];
    $existencias = $data[5];

    $sql = "INSERT INTO juego(nomJuego, idcategoia, precio, imagen, clasificacion, existencias)
            VALUES ('$nomJuego', '$categoria', '$precio', '$imagen', '$clasificacion', '$existencias')";
    
    return $this->consulta($sql);
  }

  public function update($data)
  {
    $nomJuego = $this->secureSQL($data[0]);
    $categoria = $this->secureSQL($data[1]);
    $precio = $this->secureSQL($data[2]);
    $imagen = $this->secureSQL($data[3]);
    $clasificacion = $this->secureSQL($data[4]);
    $existencias = $this->secureSQL($data[5]);
    $id = $this->secureSQL($data[6]);

    $sql = "UPDATE juego SET nomJuego = '$nomJuego', idcategoia = '$categoria', 
    precio = '$precio', imagen = '$imagen', clasificacion = '$clasificacion', existencias = '$existencias' 
    WHERE idJuego = $id";
    return $this->consulta($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM juego WHERE idjuego = $id";
    return $this->consulta($sql);
  }
}
