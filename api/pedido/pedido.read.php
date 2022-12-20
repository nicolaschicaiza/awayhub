<?php
include_once 'pedido.api.php';

$api = new ApiPedido();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(is_numeric($id)){
        $api->getById($id);
    } else {
        $api->error("El id es incorrecto");
    }
} elseif(isset($_GET['cliente'])){
    $cliente = $_GET['cliente'];

    if(is_numeric($cliente)){
        $api->getProductoByIdCliente($cliente);
    } else {
        $api->error("El id es incorrecto");
    }
} else {
    $api->getAll();
}

?>
