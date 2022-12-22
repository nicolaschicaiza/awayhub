<?php

include_once 'api/usuario/user.api.php';
include_once 'api/usuario/user_session.php';

$userSession = new UserSession();   //CREAR OBJETO USER SESSION
$api = new ApiUser(); //PARA MANEJAR USUARIO ACTUAL
$users = new User(); //PARA MANEJAR USUARIO ACTUAL
$nombre = array();

if (isset($_SESSION['end'])) {
  session_unset();
  session_destroy();
} else {

  if (isset($_SESSION['user'])) {

    //echo "Hay sesión";
    $api->set($userSession->getCurrentUser()); //RECUPERANDO EL NOMBRE DEL USUARIO
    $nombre = $api->get($_SESSION['user']);
    $id = $nombre[0]['id'];
    ob_start();
    $_SESSION['id'] = $id;
    $_SESSION['end'] = false;
    header("Location: pages/home.php?id=$id");
  } else if (isset($_POST['username']) && isset($_POST['password'])) {
    //echo "Validación de login";

    $user['username'] = $_POST['username'];     //MAPEAR INFORMACION
    $user['password'] = $_POST['password'];

    if ($api->validate($user)) {      //ENTRAR A LA BD Y VALIDAR POR EL NOMBRE USU Y PASS
      //echo "usuario validado";
      $userSession->setCurrentUser($user['username']);
      $api->set($user['username']);      //LLENAR LOS DATOS
      $nombre = $api->get($user['username']);
      $id = $nombre[0]['id'];
      ob_start();
      $_SESSION['id'] = $id;
      $_SESSION['end'] = false;
      header("Location: pages/home.php?id=$id");
    } else {
      //echo "nombre de usuario y/o password incorrecto";
      $errorLogin = "Nombre de usuario y/o password es incorrecto";
      include('pages/login.php');
    }
  } else {
    //echo "Login";
    include('pages/login.php');
  }
}
