<?php
include_once 'producto.api.php';

$api = new ApiProducto();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id)) {
        $api->getById($id);
    } else {
        $api->error("El id es incorrecto");
    }
} else {
    $api->getAll();
}
