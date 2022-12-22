<?php
include_once 'user.php';

class ApiUser
{
  public function validate($item)
  {
    $user = new User();
    $users = array();

    $res = $user->userExists($item);

    if ($res->rowCount() == 1) {
      $row = $res->fetch();

      $item = array(
        "id" => $row['id'],
        "nombre" => $row['nombre'],
        "username" => $row['username'],
        "password" => $row['password'],
      );
      array_push($users, $item);

      // echo json_encode(['statuscode' => 200, 'items' => $users]);
      return true;
    } else {
      return false;
      // echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud']);
    }
  }


  public function set($item)
  {
    $user = new User();
    $users = array();

    $res = $user->setUser($item);

    if ($res->rowcount()) {
      foreach ($res as $currentuser) {  //se hace el barrido
        $user->nombre = $currentuser['nombre'];
        $user->username = $currentuser['username'];
      }
    }
  }

  public function get($item)
  {
    $user = new User();
    $users = array();

    $res = $user->setUser($item);

    if ($res->rowcount()) {
      foreach ($res as $currentuser) {  //se hace el barrido
        $item = array(
          'id' => $currentuser['id'],
          'nombre' => $currentuser['nombre'],
          'username' => $currentuser['username'],
        );
        array_push($users, $item);
      }
    }
    return $users;
  }
}
