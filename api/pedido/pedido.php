<?php
include_once '../../lib/db.php';

class Pedido extends DB{
  
  function __construct(){
    parent::__construct();
  }

  public function getPedidos(){
    $query = $this->connect()->prepare('SELECT * FROM pedido');
    $query->execute([]);
    return $query;
  } 

  public function getPedidoById($id){
      $query = $this->connect()->prepare('SELECT * FROM pedido WHERE id_pedido = :id_pedido');
      $query->execute(['id_pedido' => $id]);
      return $query;
  }

  public function getPedidoByIdCliente($id){
    $query = $this->connect()->prepare('SELECT * FROM pedido WHERE id_cliente = :id_cliente');
    $query->execute(['id_cliente' => $id]);
    return $query;
  }

  public function getPedidoProductoByIdCliente($id){
      $query = $this->connect()->prepare('SELECT id_pedido,id_cliente,producto.id_producto,cantidad,subtotal,nombre,precio FROM pedido JOIN producto ON producto.id_producto=pedido.id_producto WHERE pedido.id_cliente=:id_cliente');
      $query->execute(['id_cliente' => $id]);
      return $query;
  }

  public function createPedido($pedido){
     $query = $this->connect()->prepare('INSERT INTO pedido(id_pedido, id_cliente, id_producto, cantidad, subtotal) VALUES (:id, :id_cliente, :id_producto, :cantidad, :subtotal)');
     $query->execute(['id' => $pedido['id'], 'id_cliente' => $pedido['id_cliente'], 'id_producto' => $pedido['id_producto'], 'cantidad' => $pedido['cantidad'], 'subtotal' => $pedido['subtotal']]);
     return $query;
  }

  public function updatePedido($pedido){
      $query = $this->connect()->prepare('UPDATE pedido SET cantidad=:cantidad, subtotal=:subtotal WHERE id_producto=:id_producto');
      $query->execute(['cantidad' => $pedido['cantidad'], 'subtotal' => $pedido['subtotal'], 'id_producto' => $pedido['id_producto']]);
      return $query;
  }
}