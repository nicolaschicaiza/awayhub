
<?php
include_once 'producto.api.php';

$response = json_decode(file_get_contents('http://localhost/awayhub/api/producto/producto.read.php'), true);

$api = new ApiProducto();
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$item = array();
echo var_dump($precio);

if(isset($id)){
  foreach ($response['items'] as $producto) {
    if($producto['id'] == $id) {
      $item = array(
          "id" => $producto['id'],
          "nombre" => $nombre,
          "precio" => $precio,
      );
    }
  }
  $api->update($item);
  header('Location:../../pages/home.php', '');
} else {
  $api->error('Error al llamar la API');
}
