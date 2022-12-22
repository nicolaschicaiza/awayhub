<?php
include_once 'pedido.api.php';


$response = json_decode(file_get_contents('http://localhost/awayhub/api/pedido/pedido.read.php'), true);

$api = new ApiPedido();
$id_producto = $_GET['producto'];
$id_cliente = $_GET['cliente'];
$precio = $_GET['precio'];
$nuevo = false;
$error = '';
$item = array();

if(isset($id_producto)){
    foreach ($response['items'] as $pedido){
        if($pedido['id_cliente'] == $id_cliente){
            if($pedido['id_producto'] == $id_producto){
                $pedido['cantidad'] = $pedido['cantidad'] + 1;
                $item = array(
                    "id" => $pedido['id'],
                    "id_cliente" => $pedido['id_cliente'],
                    "id_producto" => $pedido['id_producto'],
                    "cantidad" => $pedido['cantidad'],
                    "subtotal" => $precio * $pedido['cantidad'],
                );
                $nuevo = false;
                break;
            } else {
                $nuevo = true;
            }
        }
    }
    if($nuevo){
        $cantidad = 1;
        $item = array(
            "id" => $id_pedido,
            "id_cliente" => $id_cliente,
            "id_producto" => $id_producto,
            "cantidad" => $cantidad,
            "subtotal" => $precio * $cantidad,
        );
        $api->add($item);
    } else {
        $api->update($item);
    }
    $_SESSION['message'] = 'Pedido Creado';
    $_SESSION['message_type'] = 'success';
    header('Location:../../pages/pedido.php', '');
} else {
    $api->error('Error al llamar la API');
}