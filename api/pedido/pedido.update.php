<?php
include_once 'pedido.api.php';

$response = json_decode(file_get_contents('http://localhost/awayhub/api/pedido/pedido.read.php'), true);

$api = new ApiPedido();
$id = $_REQUEST['id'];
$cantidad = $_REQUEST['cantidad'];
$item = array();
echo $id;

if(isset($id)){
  foreach ($response['items'] as $pedido) {
    if($pedido['id'] == $id) {
      $item = array(
          "id" => $pedido['id'],
          "id_cliente" => $pedido['id_cliente'],
          "id_producto" => $pedido['id_producto'],
          "cantidad" => $cantidad,
          "subtotal" => $pedido['subtotal']/$pedido['cantidad'] * $cantidad,
      );
    }
  }
  $api->update($item);
  header('Location:../../pages/pedido.php', '');
} else {
  $api->error('Error al llamar la API');
}
