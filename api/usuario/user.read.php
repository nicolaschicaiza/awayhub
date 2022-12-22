<?php
include_once 'user.api.php';

$api = new ApiUser();

if (isset($_GET['user'])) {
    $user = $_GET['user'];

    if (!is_numeric($user)) {
        $api->get($user);
    } else {
        $api->error("El id es incorrecto");
    }
} else {
    $api->getAll();
}