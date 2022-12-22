<?php
include_once '../../lib/db.php';

class Producto extends DB{
  
  function __construct(){
    parent::__construct();
  }

  public function getProductos(){
    $query = $this->connect()->prepare('SELECT * FROM producto');
    $query->execute([]);
    return $query;
  } 

  public function getProductoById($id){
    $query = $this->connect()->prepare('SELECT * FROM producto WHERE id_producto = :id_producto');
    $query->execute(['id_producto' => $id]);
    return $query;
  }

  public function createProducto($producto){
     $query = $this->connect()->prepare('INSERT INTO producto(nombre,precio) VALUES (:nombre, :precio)');
     $query->execute(['nombre' => $producto['nombre'], 'precio' => $producto['precio']]);
     return $query;
  }

  public function updateProducto($producto){
    $query = $this->connect()->prepare('UPDATE producto SET nombre=:nombre, preciol=:precio WHERE id=:id');
    return $query;
}
}