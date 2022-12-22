<?php
include_once 'producto.api.php';

$api = new ApiProducto();
$id_pedido = $_GET['id'];

if(isset($id_pedido)){
  $api->delete($id_pedido);
  header('Location:../../pages/home.php', '');
} else {
  $api->error('Error al llamar la API');
}
?>