<?php
include_once "../../lib/db.php";

class Cliente extends DB{
  private $id;
  private $nombre;
  private $correo;
  private $telefono;
  private $direccion;

  public function create(){
      $pre = $this->connect()->prepare("INSERT INTO cliente(id_cliente,nombre,correo,telefono,direccion) VALUES (?,?,?,?,?)");
      $pre->bindParam("ssi", $this->id_cliente, $this->nombre, $this->correo, $this->telefono, $this->direccion);
      $pre->execute();
  }
}