<?php
include_once 'pedido.api.php';

$response = json_decode(file_get_contents('http://localhost/awayhub1/api/pedido/pedido.read.php'), true);

$api = new ApiPedido();


