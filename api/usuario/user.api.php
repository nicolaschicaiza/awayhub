<?php
include 'user.php';

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

  function getAll()
  {
    $user = new User();
    $users = array();

    $res = $user->getUsers();

    if ($res->rowCount()) {
      while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'username' => $row['username'],
        );
        array_push($users, $item);
      }

      echo json_encode(['statuscode' => 200, 'items' => $users]);
    } else {
      echo json_encode(['statuscode' => 404, 'response' => 'Nose puede procesar la solicitud *getAll*']);
    }
  }

  public function get($item)
  {
    $user = new User();
    $users = array();

    $res = $user->getByUser($item);

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

  function error($mensaje)
  {
    echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
  }

  function exito($mensaje)
  {
    echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
  }

  function printJSON($array)
  {
    echo '<code>' . json_encode($array) . '</code>';
  }

  function getError()
  {
    return $this->error;
  }
}
