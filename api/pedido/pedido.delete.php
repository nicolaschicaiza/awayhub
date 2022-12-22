<?php
include_once 'pedido.api.php';

$api = new ApiPedido();
$id_pedido = $_GET['id'];

if(isset($id_pedido)){
  $api->delete($id_pedido);
  header('Location:../../pages/pedido.php', '');
} else {
  $api->error('Error al llamar la API');
}
?>